$(document).ready(function(){

$("#index a:contains('Home')").parent().addClass('active');
$("#search a:contains('Search')").parent().addClass('active');
$("#package a:contains('Packages')").parent().addClass('active');
$("#aboutus a:contains('About Us')").parent().addClass('active');
$("#contact a:contains('Contact')").parent().addClass('active');
$("#register a:contains('Welcome Gest')").parent().addClass('active');
$("#login a:contains('Login')").parent().addClass('active');
$("#terms a:contains('Terms of Use')").parent().addClass('active');
$("#policy a:contains('Privacy Policy')").parent().addClass('active');
$("#success a:contains('Success Story')").parent().addClass('active');
$("#demomatches a:contains('Matches')").parent().addClass('active');
//active menu for side bar
$("#profile a:contains('Profile Details')").addClass('active');
$("#photo a:contains('Upload Photo')").addClass('active');
$("#intres a:contains('Express Interest Sent')").addClass('active');
$("#shortlist a:contains('Short List')").addClass('active');
$("#matches a:contains('Matches')").addClass('active');
$("#livechat a:contains('Online Chat')").addClass('active');
$("#story a:contains('Success Story')").addClass('active');
$("#changepass a:contains('Change Password')").addClass('active');
$("#closeac a:contains('Close Account')").addClass('active');

/*
$('ul.nav li.dropdown').hover(function(){
	$('.dropdown-menu', this).fadeIn('');
}, function(){
	$('.dropdown-menu', this).fadeOut('fast');
}); //hover */

});