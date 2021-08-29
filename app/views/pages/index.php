<?php

foreach ($data["users"] as $user)
{
    echo '
    <div style="background:blue; max-width:250px;">
        <h3 style="color: yellow ; font-family:italic">'.$user->user_name.'</h3>
        
        <p style="color:white">
            Email: '.$user->user_email.' <br />
            Password: '.$user->user_pass.' <br />
        </p>
    </div>
    ';
}

echo "@developed by: Droid";

?>