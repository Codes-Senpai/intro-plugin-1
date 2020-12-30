<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       refka-mahdouani
 * @since      1.0.0
 *
 * @package    Refka
 * @subpackage Refka/admin/partials
 */
?>
<h1 >Senpai Refka</h2>

<div class="form">
    <div>
        <label for="name">Nom :</label>
        <input type="text" id="nom" name="user_name">
    </div>
    <div>
        <label for="name">Tel :</label>
        <input type="text" id="tel">
    </div>
    <div>
        <label for="mail">E-mail :</label>
        <input type="email" id="mail" name="user_mail">
    </div>

    <div>
        <label for="password">password :</label>
        <input type="text" id="password" name="password">
    </div>
    <div>
        <label for="msg">Message :</label>
        <textarea id="msg" name="user_message"></textarea>
    </div>
    <div  class="button">
    <button id="submit-envoyer" >Envoyer</button>
    </div>
</div>


<!-- This file should primarily consist of HTML with a little bit of PHP. -->
