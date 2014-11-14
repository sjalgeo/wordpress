<?php

class SJA_Banner_Wide {

    public $message1;
    public $message2;
    public $message3;
    public $message4;
    public $message_hover;


    function SJA_Banner_Wide( $msg1,$msg2,$msg3,$msg4,$hover1, $hover2='' ){
        $this->message1         = $msg1;
        $this->message2         = $msg2;
        $this->message3         = $msg3;
        $this->message4         = $msg4;
        $this->message_hover1   = $hover1;
        $this->message_hover2   = $hover2;

        return $this->get_html();

    }
    function get_html(){
        $output = '

            <input class="sjawp-playstop" type="radio" name="sto" id="play" checked>
            <input class="sjawp-playstop"  type="radio" name="sto" id="stop">

            <div class="cont">

                <a href="#">
                    <div class="hover_info">
                        <p><span>' . $this->message_hover1 . '</span>
                        <span class="booknow">' . $this->message_hover2 . '</span></p>
                    </div>
                </a>

                <div class="image">
                    <div class="sjawp-banner-item">
                        <span class="sjawp-banner-text">' . $this->message1 . '</span>
                    </div>
                    <div class="sjawp-banner-item">
                        <span class="sjawp-banner-text">' . $this->message2 . '</span>
                    </div>
                    <div class="sjawp-banner-item">
                        <span class="sjawp-banner-text">' . $this->message3 . '</span>
                    </div>
                    <div class="sjawp-banner-item">
                        <span class="sjawp-banner-text">' . $this->message4 . '</span>
                    </div>
                </div>
            </div>';

        return $output;
    }
}

?>