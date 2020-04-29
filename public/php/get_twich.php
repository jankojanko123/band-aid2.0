<?php
//ger viewer count and title
if ( $media_data->last()->type == 'stream'){

    $username = $media_data->last()->username;
    $twitch = new romanzipp\Twitch\Twitch;
    $twitch->setClientId('lze3t1okyae8txn8hys3utpit8osw4');
    // Get User by Username
    $result = $twitch->getUserByName($username);

    // Check, if the query was successfull
    if (!$result->success()) {
        die('Ooops: ' . $result->error());
    }
    // Shift result to get single user data
    $user = $result->shift();
    $userId = $user->id;

    $result = $twitch->getStreams(['user_id' => $userId], $paginator = NULL, isset($result) ? $result->next() : null);

    if(empty($result->data)){

        $media_id = 604037253; //hardcode bob ross
        $media_type = 'video';
        $media_title = 'Stream currenty offline, but here is Bob Ross';
        $viewer_count = '22323';

    }else {
        $viewer_count = $result->data[0]->viewer_count;
        $media_title = $result->data[0]->title;
        $media_id = $media_data->last()->media_id;
        $media_type = $media_data->last()->type;
    }

}elseif($media_data->last()->type == 'video'){

    $twitch = new romanzipp\Twitch\Twitch;
    $twitch->setClientId('lze3t1okyae8txn8hys3utpit8osw4');
    $media_id = (int)$media_data->last()->media_id;

    $result = $twitch->getVideosById($media_id, $parameters = array (), $paginator = NULL);
    // Check, if the query was successfull
    if (!$result->success()) {
        die('Ooops: ' . $result->error());
    }

    if(empty($result->data)){
        $media_id = 604037253; //hardcode bob ross
        $media_type = 'video';
        $media_title = 'Stream currenty offline, but here is Bob Ross';
        $viewer_count = '22323';

    }else {
        $viewer_count = $result->data[0]->view_count;
        $media_title = $result->data[0]->title;
        $media_id = $media_data->last()->media_id;
        $media_type = $media_data->last()->type;
    }
}
else{ //if everything fails play bob ross
    $media_id = 604037253; //hardcode bob ross
    $media_type = 'video';
    $media_title = 'Stream currently offline, but here is Bob Ross';
    $viewer_count = '22323';
}
?>
