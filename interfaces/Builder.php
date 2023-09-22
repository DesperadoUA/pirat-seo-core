<?php
interface Builder {
  public function ampAttrHead();
  public function wp_head(HeadData $data);
  public function styles($str);
  public function canonical();
  public function wp_footer();
  public function footer();
  public function header();
  public function content($content);
  public function faq(Faq $faq);
  public function getTranslate($key);
}
?>