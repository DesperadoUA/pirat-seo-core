<?php
class TextSettings {
    public $weight = '';
    public $color = '';
    public $size = '';
    public $tag = '';
    public $class = '';
    public $decoration = '';
    public $align =  '';

    private $availableWeight = ['thin', 'extra-light', 'light', 'regular', 'medium', 'semi-bold', 'bold', 'extra-bold', 'black'];
    private $availableSize = ['small', 'medium', 'large', 'x-large', '2x-large'];
    private $availableTag = ['span', 'div', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'label'];
    private $availableDecoration = ['underline', 'overline', 'line-through', 'blink', 'solid', 'wavy', 'dotted', 'dashed', 'double'];
    private $availableColor = ['cairo', 'calgary', 'cordoba', 'callao', 'cucuta', 'colombo', 'cancun', 'cochin', 'cardiff', 'cleveland'];
    private $availableAlign = ['left', 'right', 'center', 'justify'];
    function __construct($settings) {
        $this->weight = (array_key_exists('weight', $settings) and in_array($settings['weight'], $this->availableWeight)) 
            ? "text_weight_{$settings['weight']}" : "text_weight_regular";
        $this->color = (array_key_exists('color', $settings) and in_array($settings['color'], $this->availableColor))
            ? "text_color_{$settings['color']}" : "text_color_cairo";
        $this->size = (array_key_exists('size', $settings) and in_array($settings['size'], $this->availableSize))
            ? "text_size_{$settings['size']}" : "text_size_medium";
        $this->tag = (array_key_exists('tag', $settings) and in_array($settings['tag'], $this->availableTag))
            ? $settings['tag'] : "span";
        $this->class = array_key_exists('class', $settings) ? $settings['class'] : "";
        $this->decoration = (array_key_exists('decoration', $settings) and in_array($settings['decoration'], $this->availableDecoration))
            ? "text_decoration_{$settings['decoration']}" : "";
        $this->align = (array_key_exists('align', $settings) and in_array($settings['align'], $this->availableAlign))
            ? "text_align_{$settings['align']}" : "";
    }
    public function getSettings() {
        return [
            'weight' => $this->weight,
            'color' => $this->color,
            'size' => $this->size,
            'class' => $this->class,
            'decoration' => $this->decoration,
            'align' => $this->align
        ];
    }
}