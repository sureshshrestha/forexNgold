<?php

class Scrape_engine extends CI_Controller {

    protected $html = null;

    function __construct() {
        parent::__construct();

        $this->load->helper('simple_html_dom');
        $this->load->helper('nepali_calendar');
        $this->load->model('metal');
        $this->load->model('chart');
    }

    public function make_log() {
        date_default_timezone_set('Asia/kathmandu');
        $time = date('jS F Y h:i:s A');
        $file = 'log.txt';
        // Open the file to get existing content
        $current = file_get_contents($file);
        // Append a new person to the file
        $current .= "Gold & Silver Data for have been updated @::" . $time . ".\r\n";
        // Write the contents back to the file
        file_put_contents($file, $current, LOCK_EX);
    }

    function _convert2AD($dateInBS) {
        $engDate = new nepali_calendar();
        $y = $dateInBS['year'];
        $m = $dateInBS['month'];
        $d = $dateInBS['day'];
        //format month into corresponding digits
        switch ($m) {
            case 'Baisakh':
                # code...
                $mm = 1;
                break;
            case 'Jestha':
                # code...
                $mm = 2;
                break;
            case 'Ashad':
                # code...
                $mm = 3;
                break;
            case 'Shrawan':
                # code...
                $mm = 4;
                break;
            case 'Bhadra':
                # code...
                $mm = 5;
                break;
            case 'Ashoj':
                # code...
                $mm = 6;
                break;
            case 'Kartik':
                # code...
                $mm = 7;
                break;
            case 'Mansir':
                # code...
                $mm = 8;
                break;
            case 'Poush':
                # code...
                $mm = 9;
                break;
            case 'Magh':
                # code...
                $mm = 10;
                break;
            case 'Falgun':
                # code...
                $mm = 11;
                break;
            case 'Chaitra':
                # code...
                $mm = 12;
                break;
            default:
                # code...
                $mm = 0;
                break;
        }
        //calling nep_to_eng
        $temp = $engDate->nep_to_eng_formated($y, $mm, $d);
        //var_dump($temp);exit;
        return $temp;
    }

    function gold_json() {
        $query = $this->chart->history_gold();
        foreach ($query as $values) {
            $key = array_keys($values);
            $row[] = array($values[$key[0]], $values[$key[1]], $values[$key[2]], $values[$key[3]]);
        }

        $result = json_encode($row, JSON_NUMERIC_CHECK);
        $file = FCPATH . 'lib/history_gold.json';
        file_put_contents($file, $result);
    }

    function current_gold() {
        $query = $this->chart->gold_chart();
        $field = $this->chart->get_fields('goldpricenepal');
        $result = array();
        for ($index = 1; $index < 4; $index++) {
            $series[$index]['name'] = $field[$index];
            foreach ($query as $values) {
                $key = array_keys($values);
                $series[$index]['data'][] = $values[$key[$index]];
            }
            array_push($result, $series[$index]);
        }
        $result = json_encode($result, JSON_NUMERIC_CHECK);
        $file = FCPATH . 'lib/current_gold.json';
        file_put_contents($file, $result);
    }

    function scrapeData() {
        $url = 'http://www.negosida.com.np/';
        //$url = 'http://localhost/forex_ci/lib/gold.html';
        $html = file_get_html($url);
        $scrapedDate = array('year' => null, 'month' => null, 'day' => null);

        //for date
        foreach ($html->find('div[id=calender]') as $dateToday) {
            foreach ($dateToday->find('h3') as $value) {
                //$year =  $value->plaintext;
                $this->scrapedDate['year'] = $value->plaintext;
            }
            foreach ($dateToday->find('h2') as $value) {
                // $month =  $value->plaintext;
                $this->scrapedDate['month'] = $value->plaintext;
            }
            foreach ($dateToday->find('h1') as $value) {
                // $day =  $value->plaintext;
                $this->scrapedDate['day'] = $value->plaintext;
            }
        }

        $dateBS = $this->_convert2AD($this->scrapedDate);
        $metalArray = array('Date' => null, 'Hallmark' => null, 'Tejabi' => null, 'Silver' => null);

        $temp = implode("-", $dateBS);
        $metalArray['Date'] = $temp;

        $flag = 'hallmark';
        foreach ($html->find('div[id=goldContainer]') as $goldPrice) {
            foreach ($goldPrice->find('b') as $goldValue) {
                if ($flag == 'hallmark') {
                    $metalArray['Hallmark'] = $goldValue->plaintext;
                    $flag = 'tejabi';
                } else if ($flag == 'tejabi') {
                    $metalArray['Tejabi'] = $goldValue->plaintext;
                }
                else
                    return 'Error in scraping gold price!!!';
            }
        }

        foreach ($html->find('div[id=silverContainer] li B') as $silverPrice) {
            $metalArray['Silver'] = $silverPrice->plaintext;
        }

        $metalArray = filter_var_array($metalArray, FILTER_SANITIZE_STRING);

        if ($metalArray['Date'] == '' || $metalArray['Date'] == 'null' || $metalArray['Date'] == null) {
            $metalArray['result_gold'] = "There is problem while scraping data!!";

            exit;
        } else {

            if (!$this->metal->date_check($metalArray)) {
                $metalArray['result_gold'] = ('Gold data scraped successfully of ' . $metalArray['Date']);
                $this->gold_json();
                $this->current_gold();
            }
            else
                $metalArray['existGold'] = ('Gold data of '. $metalArray['Date']. ' already exists.');
        }
        $html->clear();
        unset($html);
        $this->load->view('header_admin');
        $this->load->view('scrape_view', $metalArray);
        $this->load->view('footer');
    }

}

?>
