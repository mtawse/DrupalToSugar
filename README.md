# DrupalToSugar

Send data from Drupal webforms to SugarCRM modules.

#Drupal Requirements

[weform](https://www.drupal.org/project/webform)

[composer manager](https://www.drupal.org/project/composer_manager)

#SugarCRM Requirements

Uses SugarCRM ReST v10 API available in Sugar versions >=6.7.

#Usage

Install module and ensure Composer Manager dependencies are up to date.

Enter SugarCRM user details for the API connection.  This can be found under the services section in administration configuration.

In the Webform Edit tab select the Sugar module to send the data to.  For each Form compoent field select the corresponding Sugar field.  Under Form settings enable SugarCRM Submission.

#Credit

Thanks to Sean Pinegar for his [Sugar ReST API Wrapper](https://github.com/spinegar/sugarcrm7-api-wrapper-class)

#Todo

Enable encryption for Sugar credentials

Pull in language strings for module and field names

Validation for enum-type fields

Test with multiselects

Enable related modules and links
