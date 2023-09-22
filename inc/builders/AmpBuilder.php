<?php
class AmpBuilder implements Builder {
    use UI_AMP;
    private $ampPrefix = PREFIX_AMP;
    private $translate = TRANSLATE;
    private $lang = LANG;
    private $templateDirUri = TEMPLATE_DIR_URI;
    private $siteUrl = SITE_URL;
    private $url = URL;
    public function wp_head(HeadData $data) {
        return "<title>{$data->title}</title>
        <meta name='description'  content='{$data->description}' />
        <script async src='https://cdn.ampproject.org/v0.js'></script>
        <script async custom-element='amp-sidebar' src='https://cdn.ampproject.org/v0/amp-sidebar-0.1.js'></script>
        <script async custom-element='amp-script' src='https://cdn.ampproject.org/v0/amp-script-0.1.js'></script>
        <script async custom-element='amp-iframe' src='https://cdn.ampproject.org/v0/amp-iframe-0.1.js'></script>";
    }
    public function styles($str) {
        return "<style amp-boilerplate>
                    body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;
                        -moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;
                        -ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;
                        animation:-amp-start 8s steps(1,end) 0s 1 normal both}
                    @-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
                    @-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
                    @-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
                    @-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
                    @keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
                </style>
                <noscript>
                    <style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style>
                </noscript>
                <style amp-custom>
                   {$str}     
                </style>";
    }
    public function canonical() {
        $link = $this->siteUrl.str_replace('/'.$this->ampPrefix, '', $this->url);
        return "<link rel='canonical' href='{$link}' />";
    }
    public function wp_footer() {
        return '';
    }
    public function ampAttrHead() {
        return "amp";
    }
    public function header() {
        return "<header>AMP Header</header>
            <amp-script layout='container' src='{$this->templateDirUri}/js/amp_script.js'>";
    }
    public function footer() {
        return "<footer>AMP Footer</footer></amp-script>";
    }
    public function content($content) {
        return "<article class='content'>{$content}</article>";
    }
    public function faq(Faq $faq) {
        return "<section class='faq'>
                    <h2>{$faq->title}</h2>
                </section>";
    }
    public function getTranslate($key) {
        return array_key_exists($key, $this->translate) ? $this->translate[$key][$this->lang] : "";
    }
    public function test() {
        return $this->button();
    }
}