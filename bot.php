<?php
#-------------------------[Include]-------------------------#
require_once('./include/line_class.php');
require_once('./unirest-php-master/src/Unirest.php');
#-------------------------[Token]-------------------------#
$channelAccessToken = 'ZBFGudHCUS4APj9Lm3wOxZyLYkly+XxUks9MbeInuprqq+mpwkd6y8qrJV8mSlluf0TiEAGVYRDkGPmh5pryjm+fLgsrmXZqDfiv6Ku1cG4isOchteXtFKCgwrGn5G66f+icBiYpj0sxdQ//mMwoZwdB04t89/1O/w1cDnyilFU=';
$channelSecret = 'd6fd3b50b743e6479ab94dbb97728b62';
#-------------------------[Events]-------------------------#
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId     = $client->parseEvents()[0]['source']['userId'];
$groupId    = $client->parseEvents()[0]['source']['groupId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp  = $client->parseEvents()[0]['timestamp'];
$type       = $client->parseEvents()[0]['type'];
$message    = $client->parseEvents()[0]['message'];
$profile    = $client->profil($userId);
$repro = json_encode($profile);
$messageid  = $client->parseEvents()[0]['message']['id'];
$msg_type      = $client->parseEvents()[0]['message']['type'];
$msg_message   = $client->parseEvents()[0]['message']['text'];
$msg_title     = $client->parseEvents()[0]['message']['title'];
$msg_address   = $client->parseEvents()[0]['message']['address'];
$msg_latitude  = $client->parseEvents()[0]['message']['latitude'];
$msg_longitude = $client->parseEvents()[0]['message']['longitude'];
#----Check title empty----#
if (empty($msg_title)) {
    $msg_title = 'ที่ไหนก็ได้ โตแล้ว';
}
#----command option----#
$usertext = explode(" ", $message['text']);
$command = $usertext[0];
$options = $usertext[1];
if (count($usertext) > 2) {
    for ($i = 2; $i < count($usertext); $i++) {
        $options .= '+';
        $options .= $explode[$i];
    }
}
#----command option----#
$remsg = json_encode($message, true);
$remsg1 = json_decode($remsg, true);
$remsg2 = $remsg1['text'];
$stickerId = $remsg1['stickerId'];
$reline = json_encode($profile, true);
$reline1 = json_decode($reline, true);
$reline2 = $reline1['displayName'];
#-------------------------[MSG TYPE]-------------------------#
if ($msg_type == 'location') {
    $stickerurl = "https://images.unsplash.com/photo-1486016006115-74a41448aea2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=747&q=80";
    $Linkurl="https://www.ventusky.com/?p=".$msg_latitude.";".$msg_longitude.";10&l=rain-3h";
    $mreply = array
          (
              'replyToken' => $replyToken,
              'messages' => array
               (
                        array(
                        'type' => 'flex',
                        'altText' => 'Rainfall your location.',
                        'contents' => array(
                                    'type' => 'bubble',
                                    'hero' => array
                                    (
                                            'type' => 'image',
                                            'size' => 'full',
                                            'aspectMode'=>'cover',
                                            'url' => $stickerurl
                                     ),
                                    'body' => array
                                     (
                                            'type' => 'box',
                                            'layout' => 'vertical',
                                            'contents' =>
                                             array(
                                                array(
                                                    'type' => 'text',
                                                    'align' => 'start',
                                                    'size' => 'lg',
                                                    'wrap' => true,
                                                    'color'=> '#565A5C',
                                                    'text' => 'ตำแหน่งปริมาณน้ำฝน'
                                                ),
                                                array(
                                                    'type' => 'separator'
                                                ),
                                                array (
                                                  'type' => 'box',
                                                  'layout' => 'vertical',
                                                  'margin' => 'lg',
                                                  'spacing' => 'sm',
                                                  'contents' =>
                                                  array (
                                                    0 =>
                                                    array (
                                                      'type' => 'box',
                                                      'layout' => 'baseline',
                                                      'spacing' => 'sm',
                                                      'contents' =>
                                                      array (
                                                        0 =>
                                                        array (
                                                          'type' => 'text',
                                                          'text' => 'ที่ตั้ง',
                                                          'color' => '#aaaaaa',
                                                          'size' => 'sm',
                                                          'flex' => 1,
                                                        ),
                                                        1 =>
                                                        array (
                                                          'type' => 'text',
                                                          'text' => ''.$msg_address,
                                                          'wrap' => true,
                                                          'size' => 'sm',
                                                          'color' => '#666666',
                                                          'flex' => 4,
                                                        ),
                                                      ),
                                                    ),
                                                    1 =>
                                                    array (
                                                      'type' => 'box',
                                                      'layout' => 'baseline',
                                                      'spacing' => 'sm',
                                                      'contents' =>
                                                      array (
                                                        0 =>
                                                        array (
                                                          'type' => 'text',
                                                          'text' => 'ละติจูด',
                                                          'color' => '#aaaaaa',
                                                          'size' => 'sm',
                                                          'flex' => 1,
                                                        ),
                                                        1 =>
                                                        array (
                                                          'type' => 'text',
                                                          'text' => ''.$msg_latitude,
                                                          'wrap' => true,
                                                          'color' => '#666666',
                                                          'size' => 'sm',
                                                          'flex' => 4,
                                                        ),
                                                      ),
                                                    ),
                                                    2 =>
                                                    array (
                                                      'type' => 'box',
                                                      'layout' => 'baseline',
                                                      'spacing' => 'sm',
                                                      'contents' =>
                                                      array (
                                                        0 =>
                                                        array (
                                                          'type' => 'text',
                                                          'text' => 'ลองจิจูด',
                                                          'color' => '#aaaaaa',
                                                          'size' => 'sm',
                                                          'flex' => 1,
                                                        ),
                                                        1 =>
                                                        array (
                                                          'type' => 'text',
                                                          'text' => ''.$msg_longitude,
                                                          'wrap' => true,
                                                          'color' => '#666666',
                                                          'size' => 'sm',
                                                          'flex' => 4,
                                                        ),
                                                      ),
                                                    ),
                                                  ),
                                                )
                                             )
                                     ),
                                    'footer' => array
                                     (
                                            'type' => 'box',
                                            'layout' => 'vertical',
                                            'contents' =>
                                            array (
                                              0 =>
                                              array (
                                                'type' => 'button',
                                                'style' => 'primary',
                                                'action' =>
                                                        array (
                                                          'type' => 'uri',
                                                          'label' => 'ดูปริมาณน้ำฝน',
                                                          'uri' => $Linkurl,
                                                        )
                                              )
                                            )
                                     )
                                 )
                        )
                      )

          );
}
else {
    $url = "https://bots.dialogflow.com/line/b215c49b-0b36-45b7-9db4-429ab4b0095a/webhook";
    $headers = getallheaders();
    file_put_contents('headers.txt',json_encode($headers, JSON_PRETTY_PRINT));
    file_put_contents('body.txt',file_get_contents('php://input'));
    $headers['Host'] = "bots.dialogflow.com";
    $json_headers = array();
    foreach($headers as $k=>$v){
        $json_headers[]=$k.":".$v;
    }
    $inputJSON = file_get_contents('php://input');
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $url);
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_BINARYTRANSFER, true);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $inputJSON);
    curl_setopt( $ch, CURLOPT_HTTPHEADER, $json_headers);
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec( $ch );
    curl_close( $ch );
}
if (isset($mreply)) {
    $result = json_encode($mreply);
    $client->replyMessage($mreply);
}
?>
