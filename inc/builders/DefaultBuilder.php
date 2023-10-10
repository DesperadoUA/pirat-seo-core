<?php
class DefaultBuilder implements Builder {
    use UI;
    private $ampPrefix = PREFIX_AMP;
    private $translate = TRANSLATE;
    private $lang = LANG;
    private $siteUrl = SITE_URL;
    private $url = URL;
    public function wp_head(HeadData $data) {
        wp_head();
        return '';
    }
    public function styles($str) {
        return "<style>{$str}</style>";
    }
    public function canonical() {
        $link = $this->siteUrl.$this->url.$this->ampPrefix.'/';
        return "<link rel='amphtml' href='{$link}' />";
    }
    public function wp_footer() {
        wp_footer();
        echo '<script type="text/javascript" src="http://localhost/test-site/wp-content/themes/seo/js/script.js" ></script>';
        return '';
    }
    public function ampAttrHead() {
        return "";
    }
    public function header() {
        return "<header>Default Header</header>";
    }
    public function footer() {
        return "<footer>Default Footer</footer>";
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
        $content = 'Test content setting new';
        $content2 = 'Test content 2 setting new';
        $settings = new TextSettings([
            'size' => '2x-large',
            'weight' => 'bold',
            'tag' => 'div',
            'color' => 'cairo',
            'decoration' => 'underline',
            'align' => 'center',
            'class' => 'custom_class custom_class_2'
        ]);
        $settings2 = new TextSettings([
            'size' => 'large',
            'weight' => 'thin',
            'tag' => 'div',
            'color' => 'colombo',
            'align' => 'left'
        ]);
        echo "
        <style>
            .card {
                width: 300px;
                height: 200px;
                border: 1px solid red;
                position: relative;
            }
            .wrapper {
                width: 93%;
                height: 90%;
                max-height: 100%;
                overflow-y: auto;
                box-sizing: border-box;
                opacity: 0;
                padding-right: 5px;
                top: 5%;
                left: 5%;
                position: absolute;
                transition: 0.7s;
                cursor: pointer;
            }
            .fadeIn {
                opacity: 1;
            }
        </style>";
        echo "<div class='card'>
            <div class='wrapper managerCard'>
                <p>В html разметке страницы просто прописываем блоку класс contentiable, далее при запуске в браузере нужно дописать 
                еще пару строк контента что бы убедится что его размер не увеличивается больше чем указано в max-height и что 
                появляется scroll при большой высоте контента блока.</p>
                <p>В html разметке страницы просто прописываем блоку класс contentiable, далее при запуске в браузере нужно дописать 
                еще пару строк контента что бы убедится что его размер не увеличивается больше чем указано в max-height и что 
                появляется scroll при большой высоте контента блока.</p>
            </div>
        </div>
        <div class='card'>
            <div class='wrapper managerCard'>
                <p>В html разметке страницы просто прописываем блоку класс contentiable, далее при запуске в браузере нужно дописать 
                еще пару строк контента что бы убедится что его размер не увеличивается больше чем указано в max-height и что 
                появляется scroll при большой высоте контента блока.</p>
            </div>
        </div>";
        return join(" ", [$this->text($settings, $content), $this->text($settings2, $content2)]);
    }
    public function text(TextSettings $settings, $content) {
       $classes = join(" ", $settings->getSettings());
       $tagBefore = "<{$settings->tag} class='{$classes}'>";
       $tagAfter = "</{$settings->tag}>";
       return "{$tagBefore}{$content}{$tagAfter}";
    }
}