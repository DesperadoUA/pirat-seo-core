<?php
$arr = [
    [
        'question' => 'Test question 1',
        'answer' => 'Test answer 1'
    ],
    [
        'question' => 'Test question 2',
        'answer' => 'Test answer 2'
    ],
    [
        'question' => 'Test question 3',
        'answer' => 'Test answer 3'
    ]
];
$faqArr = [];
foreach($arr as $item) {
    $faqArr[] = new FaqItem($item['question'], $item['answer']);
}
$faqSection = new Faq('Title component', $faqArr);
echo $builder->faq($faqSection);