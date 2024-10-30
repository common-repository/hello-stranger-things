<?php
/**
 * @package Hello_Stranger_Things
 * @version 0.1
 */
/*
Plugin Name: Hello Stranger Things
Plugin URI: https://wordpress.org/plugins/hello-stranger-things/
Description: This is a fun version of hello dolly plugin for fans of Stranger Things Series!
Version: 0.2
Author: Iakovos Frountas
Author URI: https://frountas.com
Text Domain: hst
*/

function stranger_things_get_phrase() {
	/** These are the phrases of Stranger Things */
	$phrases = "Mornings are for coffee and contemplation.
You shouldn’t like things because people tell you you’re supposed to.
Lando!
Friends don’t lie.
If anyone asks where I am, I’ve left the country.
Sometimes, your total obliviousness just blows my mind.
I’m stealthy, like a ninja.
I don’t care if anyone believes me.
Why are you keeping this curiosity door locked?
What’s at the X? Pirate treasure?
Am I dreaming, or is that you, Harrington?
Yeah, it’s me. Don’t cream your pants.
How do you know it’s not just a lizard?
Because his face opened up and he ate my cat!
Bitchin’
You smell that, Max? That’s actually shit. Cow shit.
I don’t see any cows.
Clearly you haven’t met the high school girls.
Bob Newby, superhero.
She will not be able to resist these pearls. *Purrs*
Yeah. Crazy together.
…It’s finger-lickin’ good
Will? What are you doing?
Hey guys, why are you headed towards the sound?
Just curious why all of a sudden you look like some MTV punk.
Dad? When Mom’s mad at you, how do you make her not mad?
I asked if you wanted to be my friend. And you said yes. You said yes. It was the best thing I’ve ever done.
Uhhh!
It’s going to be okay. Remember, Bob Newby, superhero.
I always thought stuff like this happened in movies and comic books.";

	// Here we split it into lines
	$phrases = explode( "\n", $phrases);

	// And then randomly choose a line
	return wptexturize( $phrases[ mt_rand( 0, count( $phrases ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_stranger_things() {
	$chosen = stranger_things_get_phrase();
	echo "<p id='stranger-things'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_stranger_things' );

// We need some CSS to position the paragraph
function stranger_things_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#stranger-things {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'stranger_things_css' );

?>
