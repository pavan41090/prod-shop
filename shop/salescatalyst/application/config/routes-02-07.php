<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['logout'] = 'user/logout';
$route['update-password/(:any)'] = 'user/updateUserPassword/';
$route['user-profile/(:any)'] = 'user/userprofile/';
$route['reset-password/(:any)'] = 'user/resetMyPassword/';

$route['leads'] = 'quote/index';
$route['quote'] = 'leads/index';





$route['create-lead-car'] = 'quote/createQuote';
$route['car-premium'] = 'quote/carPremium';
$route['quote-view/(:any)'] = 'quote/quoteView';
$route['create-lead-two-wheeler'] = 'quotetw/createQuoteTW';
$route['two-wheeler-premium'] = 'quotetw/twoWheelerPremium';
$route['create-lead-travel'] = 'quotetravel/createQuoteTravel';
$route['travel-premium'] = 'quotetravel/travelPremium';
$route['create-lead-personal-accident'] = 'Quotepa/createQuotepa';
$route['pa-premium'] = 'quotepa/paPremium';
$route['create-lead-critical-illnes'] = 'QuoteCritical/createQuoteCritical';

$route['critical-premium'] = 'quotecritical/criticalPremium';

$route['create-lead-super-ship'] = 'Quotesship/createQuotesship';
$route['sship-premium'] = 'Quotesship/sshipPremium';


$route['create-lead-home'] = 'quotehome/createQuoteHome';
$route['home-premium'] = 'quotehome/homePremium';
$route['create-lead-health'] = 'quotehealth/createQuoteHealth';
$route['health-premium'] = 'quotehealth/healthPremium';

//$route['qms-create-quote-travel'] = 'quotetravel/qmsCreateQuoteTravel';
$route['qms-travel-premium'] = 'quotetravel/qmsTravelPremium';

// qms quote
$route['create-quote-car'] = 'quote/qmsCreateQuote';
$route['qms-car-premium'] = 'Quote/qmsCarPremium';

$route['create-quote-two-wheeler'] = 'quotetw/qmsCreateQuoteTW';
$route['quote-two-wheeler-premium'] = 'quotetw/qmsTwoWheelerPremium';
$route['qms-two-wheeler-premium'] = 'quotetw/qmstwoWheelerPremium';
$route['create-quote-travel'] = 'quotetravel/qmsCreateQuoteTravel';
$route['create-quote-health'] = 'quotehealth/qmsCreateQuoteHealth';

$route['qms-health-premium'] = 'quotehealth/qmsHealthPremium';



$route['create-quote-home'] = 'quotehome/qmsCreateQuoteHome';
$route['qms-home-premium'] = 'quotehome/qmsHomePremium';

$route['create-quote-personal-accident'] = 'Quotepa/qmsCreateQuotepa';
$route['qms-pa-premium'] = 'Quotepa/qmsPaPremium';
$route['qms-pa-proposal'] = 'Quotepa/qmsPaProposal';
$route['qms-pa-proposal-view']='Quotepa/paProposalView';

$route['qms-pa-proposal-result']='Quotepa/proposalPAResult';



$route['create-quote-critical-illnes'] = 'QuoteCritical/qmsCreateQuoteCritical';
$route['qms-critical-premium'] = 'QuoteCritical/qmsCriticalPremium';

$route['create-quote-super-ship'] = 'Quotesship/qmsCreateQuotesship';
$route['qms-super-ship-premium'] = 'Quotesship/qmsSshipPremium';
	
$route['qms-travel-proposal'] = 'quotetravel/proposal';
$route['qms-travel-proposal-view'] = 'quotetravel/viewPropsal';  
$route['qms-travel-proposal-result'] = 'quotetravel/proposalResult';  




$route['qms-car-proposal'] = 'Quote/carProposal';
$route['qms-car-proposal-view'] = 'Quote/carPayment';
$route['qms-car-proposal-result'] = 'Quote/carproposalResult';

$route['qms-two-wheeler-proposal'] = 'Quotetw/twoWheelerProposal';
$route['qms-two-wheeler-proposal-view'] = 'Quotetw/viewPropsal';
$route['qms-two-wheeler-proposal-result'] = 'Quotetw/proposalResult';
 
$route['qms-health-proposal'] = 'Quotehealth/healthProposal';



$route['qms-critical-illnes-proposal'] = 'Quotecritical/ciProposal';
$route['qms-critical-proposal-view'] = 'Quotecritical/ciProposalView';
$route['qms-critical-proposal-result'] = 'Quotecritical/proposalCIResult';

$route['lead-list'] = 'Lead_history/leadView';
$route['lead-view/(:any)'] = 'Lead_history/leadDetailById';
$route['lead-by-dates'] = 'Lead_history/getleadsByDateRange';

$route['qms-critical-illnes-proposal'] = 'Quotecritical/ciProposal';

$route['qms-health-proposal'] = 'Quotehealth/healthProposal';
$route['qms-health-proposal-view'] = 'Quotehealth/viewPropsalHealth';


$route['qms-sship-proposal'] = 'Quotesship/sshipProposal';
//$route['qms-health-proposal-view'] = 'Quotehealth/viewPropsalHealth';

$route['qms-health-proposal-result'] = 'Quotehealth/proposalHealthResult';
$route['qms-sship-proposal-view'] = 'Quotesship/viewPropsalSship';
$route['qms-sship-proposal-result'] = 'Quotesship/proposalShipResult';

$route['qms-home-proposal'] = 'Quotehome/qmsHomeProposal';
$route['qms-home-proposal-view'] = 'Quotehome/homeProposalView';
$route['qms-home-proposal-result'] = 'Quotehome/proposalHomeResult';




// LMS
           
$route['lms-car'] = 'LmsCar/createLmsCar';
$route['lms-two-wheeler'] = 'LmsTwoWheeler/createLmsTwoWheeler';
$route['lms-travel'] = 'LmsTravel/createLmsTravel';
$route['lms-health'] = 'LmsHealth/createLmsHealth';
$route['lms-home'] = 'LmsHome/createLmsHome';
$route['lms-personal-accident'] = 'LmsPersonalAccident/createLmsPa';
$route['lms-critical-illnes'] = 'LmsCriticalIllnes/createLmsCritical';
$route['lms-super-ship'] = 'LmsSuperShip/createLmsSship';
$route['lms-combo'] = 'LmsCombo/createLmsCombo';

$route['lms-shop'] = 'LmsShop/createLmsShop';
$route['lms-office'] = 'LmsOffice/createLmsOffice';
//Route for Home Script
$route['lms-script-query'] = 'LmsHome/lmsHomeScriptQuery';
//Route for PA Script 
$route['lms-script-query-pa'] = 'LmsPersonalAccident/lmsPaScriptQuery';
//Route for Combo Script
$route['lms-script-query-combo'] = 'LmsCombo/lmsComboScriptQuery';
//Route for Office,shop,CI
$route['lms-script-query-ci'] = 'LmsCriticalIllnes/lmsCIScriptQuery';

$route['lms-dashboard'] = 'LmsCar/lmsDashboard';
$route['lms-lead-list'] = 'LmsCar/leadListing';
$route['lms-lead-download'] = 'LmsCar/lmsDownloadLeads';
$route['view-lead-details/(:any)'] = 'LmsCar/leadViewByLeadId';
$route['regenerate-lead/(:any)'] = 'LmsCar/regenerateLeadById';
$route['users-list'] = 'Backend/listEmployees';
$route['channel-list'] = 'Backend/listChannels';
$route['new-users'] = 'Backend/addEmployee';

$route['edit-user/(:any)'] = 'Backend/editEmployees';
$route['set-user-privilage/(:any)'] = 'Backend/EmployeePrivilage';

$route['dashboard-downloads'] = 'DownloadLeadsExcel/downloadExcelCommon';

/************** two wheeler data urls *****************/

$route['reg-two-vehicle'] = 'LmsTwoWheeler/getTwohellerData';
$route['cities-two-vehicle'] = 'LmsTwoWheeler/getmakeandmodelnfo';
$route['get-make-variants'] = 'LmsTwoWheeler/getvariantmakeandmodelnfo';
$route['get_post_make'] = 'LmsTwoWheeler/getcalculatetwowheeler';
$route['get-fastline-data'] = 'LmsTwoWheeler/getfastlinedatatwowheeler';
$route['two-quote-data'] = 'LmsTwoWheeler/getQuoteSeriveProposal';//getQuoteorderinfo';
$route['create-two-wheel-lead'] = 'LmsTwoWheeler/getCreatetwowheelData';



$route['policy-upload-doc'] = 'Lmspolicy/getUploaddoc';
$route['policy-doc-data'] = 'Lmspolicy/getReadLeadData';
$route['checker-dupliate'] = 'Lmspolicy/checkMobileLead';
$route['admin-excel-upload'] = 'Backend/exceluploader';
$route['admin-lead-doc-data'] = 'Backend/getReadUploaderFile';
$route['update-lead-status'] = 'LmsCar/updateLeadStausByLeadIdJson';