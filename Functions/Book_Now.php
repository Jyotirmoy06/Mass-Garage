<?php

class Book_Now
{

    // - old code - public $book_now_code =  "https://booking.workiz.com/?ac=aa316ab49b43f72760522857143bf449fa57e4e211c8e7c1417859a7ea634687";
    public $book_now_code =  "https://online-booking.workiz.com/?ac=2f054147ea418cde4e3d02729ec87d5076d762f88aa58c84d6d04b83e72eb824";
    public $base_book_now_code =  NULL;
    public $trafficSourceObj = NULL;
    public $trafficSource = NULL;

    function __construct()
    {
        $this->trafficSourceObj = new TrafficSource();
        $this->trafficSource = $this->trafficSourceObj->getTrafficSource();
        $this->base_book_now_code =  $this->book_now_code;

        if ($this->trafficSource  == 'Google Ads')
        {
            $this->book_now_code = $this->base_book_now_code . '&ad_group=Google Ads';
        }
        elseif ($this->trafficSource  == 'Bing Ads')
        {
            $this->book_now_code = $this->base_book_now_code . '&ad_group=Bing';
        }
        elseif ($this->trafficSource  == 'Facebook')
        {
            $this->book_now_code  = $this->base_book_now_code . '&ad_group=Facebook';
        }


    }

    public function get_workiz_code()
    {
        return ' <iframe class="modal-contents" style="z-gallery.php: 1000 !important;" src="' . $this->book_now_code . '"width="100%" height="900px" style="border:none;"></iframe>';
    }

    public function get_workiz_url()
    {
        return $this->book_now_code;
    }
}
