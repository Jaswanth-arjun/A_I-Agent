<?php
// config.php
return [
    'brevo' => [
        'api_key' => getenv('BREVO_API_KEY') ?: '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',
        'sender_email' => 'nellurujaswanth2004@gmail.com',
        'sender_name' => 'AI Agent System'
    ],
    'database' => [
        'host' => 'profound-jade-orca-vpmg5-mysql.profound-jade-orca-vpmg5.svc.cluster.local',
        'username' => 'mink',
        'password' => 'wK2+fH1_wU4=pO4-zJ0_',
        'name' => 'profound-jade-orca'
    ]
];
?>
