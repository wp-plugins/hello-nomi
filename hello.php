<?php
/**
 * @package Hello_Nomi
 * @version 1.0
 */
/*
Plugin Name: Hello Nomi
Plugin URI: NA
Description: She's not a whore
Author: Darrell Yeoman
Version: 1.0
Author URI: http://darrellyeoman.com
*/

function hello_nomi_get_lyric() {
	/** These are the lyrics to Hello Nomi */
	$lyrics = "There's always someone younger and hungrier coming down the stairs after you. 
Are you you hitting on me? 
No. You're not a hooker, are you?
It must be weird, not having anybody cum on you.
You got something wrong with your nipples?
Don't they have brown rice and vegetables? 
Do you like brown rice and vegetables?
I used to love Doggy Chow.
You do eat brown rice and vegetables, don't you?
Get her some brown rice, vegetables, and a bottle of Evian.
You can't touch me, but I can touch you. I'd really love to touch you.
I'm a dancer.
Dancing ain't fucking.
Man everybody got AIDS and shit.
I just went to Carver... and I kicked the shit out of him!
It doesn't suck. 
The Farmer in the Dell, The Farmer in the Dell, I had a cherry once, and now it's gone to hell. 
Life sucks. Shit Happens. I'm a student of t-shirts.
Janet Jackson, Paula Abdul. 
I'm gonna win.
Sooner or later you're gonna have to sell it. 
Fuck. Shit. Fuck. Fuck. Fuck. The fucker left.
Fucker! Fuck off! 
I just hope that I can be as good as the show. 
I'm gettin' a little too old for that whorey look.
I want my fucking suitcase... asshole! 
I liked it when you came. I liked your eyes.
I got my period. ";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_Nomi() {
	$chosen = hello_Nomi_get_lyric();
	echo "<p id='Nomi'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_Nomi' );

// We need some CSS to position the paragraph
function Nomi_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#Nomi {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'Nomi_css' );

?>