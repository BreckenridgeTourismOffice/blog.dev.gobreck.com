<?php
/*

Class RSSParser: 	2 October 2002

Author:				Duncan Gough

Overview:			An RSS parser that uses PHP and freely available RSS feeds to add fresh news content to your site.

Installation:		Decompress the file into your webroot and include it from whichever pages on which you want
					to display the data, e.g;

					include("rss.php");

Usage:				As above, just include the rss.php file from within your PHP page, and the news will appear.
					You should find the HTML code in the functions endElement(), show_title() and show_list_box() below,
					feel free to modify these to match your site.
*/

class RSSParser	{

    var $title			= "";
    var $links 			= "";
    var $description 	= "";
    var $inside_item 	= false;

	// These are just some defaults that I chose to display on my site - http://www.suttree.uklinux.net/
	// Add new RSS feeds using this format;
	// "http://www.wherever.com/path/to/rss/"	=> "Display name",
    

	function startElement( $parser, $name, $attrs='' ){
		global $current_tag;

		$current_tag = $name;

		if( $current_tag == "ITEM" )
			$this->inside_item = true;

	} // endfunc startElement

	function endElement( $parser, $tagName, $attrs='' ){
		global $current_tag;

    	if ( $tagName == "ITEM" ) {

			printf( "\t<br><b><a href='%s' target='_blank'>%s</a></b>\n", trim( $this->links ), htmlspecialchars( trim( $this->title ) ) );
    		printf( "\t<br>%s<br>\n", htmlspecialchars( trim( $this->description ) ) );

    		$this->title = "";
    		$this->description = "";
    		$this->links = "";
    		$this->inside_item = false;

    	}

	} // endfunc endElement

	function characterData( $parser, $data ){
		global $current_tag;

		if( $this->inside_item ){
			switch($current_tag){

				case "TITLE":
					$this->title .= $data;
					break;
				case "DESCRIPTION":
					$this->description .= $data;
					break;
				case "LINK":
					$this->links .= $data;
					break;

				default:
					break;

			} // endswitch

		} // end if

	} // endfunc characterData

	function parse_results( $xml_parser, $rss_parser, $file )	{

		xml_set_object( $xml_parser, &$rss_parser );
		xml_set_element_handler( $xml_parser, "startElement", "endElement" );
		xml_set_character_data_handler( $xml_parser, "characterData" );

		$fp = fopen("$file","r") or die( "Error reading XML file, $file" );

		while ($data = fread($fp, 4096))	{

			// parse the data
			xml_parse( $xml_parser, $data, feof($fp) ) or die( sprintf( "XML error: %s at line %d", xml_error_string( xml_get_error_code($xml_parser) ), xml_get_current_line_number( $xml_parser ) ) );

		} // endwhile

		fclose($fp);

		xml_parser_free( $xml_parser );

	} // endfunc parse_results

	function show_title( $rss_url ){
					?>
					<tr height="20%">
						<td valign="top">
						<small>

						<br>
						Latest news (<? echo $this->all_rss_urls[ $rss_url ]; ?>):
						</small>
						</td>
					</tr>
					<tr height="70%">
						<td valign="top">
						<small><small>
					<?
	} // endfunc show_title

	function show_list_box( $rss_url ){

				?>
           					<br>
                				
		<?
	} // end func show_list_box

} // endclass RSSParser

global $rss_url;

// Set a default feed
if( $rss_url == "" )
	$rss_url = "http://blog.gobreck.com/?feed=rss2";

$xml_parser = xml_parser_create();
$rss_parser = new RSSParser();

//$rss_parser->show_title( $rss_url );
$rss_parser->parse_results( $xml_parser, &$rss_parser, $rss_url );
$rss_parser->show_list_box( $rss_url );

?>