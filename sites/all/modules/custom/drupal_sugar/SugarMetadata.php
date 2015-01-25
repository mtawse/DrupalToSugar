<?php
/**
 * @author Martin Tawse martin.tawse@gmail.com
 * Date: 25/01/2015
 */

class SugarMetadata
{
    /**
     * Sugar modules we do not want the user to interact with
     * @var array
     */
    protected static $blacklisted_modules = array(
        // From Sugar's modInv list
        'Administration', 'Currencies', 'CustomFields', 'Connectors',
        'Dropdown', 'Dynamic', 'DynamicFields', 'DynamicLayout', 'EditCustomFields',
        'Help', 'Import', 'MySettings', 'EditCustomFields', 'FieldsMetaData',
        'UpgradeWizard', 'Trackers', 'Connectors', 'Employees', 'Calendar',
        'Manufacturers', 'ProductBundles', 'ProductBundleNotes', 'ProductCategories', 'ProductTemplates', 'ProductTypes',
        'Shippers', 'TaxRates', 'TeamNotices', 'Teams', 'TimePeriods', 'ForecastOpportunities', 'Quotas',
        'KBDocumentRevisions', 'KBDocumentKBTags', 'KBTags', 'KBContents', 'ContractTypes', 'ForecastSchedule',
        'ACLFields', 'Holidays', 'SNIP', 'ForecastDirectReports', 'System',
        'Releases', 'Sync',
        'Users', 'Versions', 'LabelEditor', 'Roles', 'EmailMarketing', 'OptimisticLock', 'TeamMemberships', 'TeamSets', 'TeamSetModule', 'Audit', 'MailMerge', 'MergeRecords', 'EmailAddresses', 'EmailText',
        'Schedulers', 'Schedulers_jobs', /*'Queues',*/
        'EmailTemplates', 'UserSignature',
        'CampaignTrackers', 'CampaignLog', 'EmailMan', 'Prospects', 'ProspectLists',
        'Groups', 'InboundEmail',
        'ACLActions', 'ACLRoles',
        'DocumentRevisions',
        'Empty',
        'ProjectTask', 'Project', 'ProjectResources',
        'RevenueLineItems',
        // Added aditional modules
        'Activities', 'Comments', 'EAPM', 'Emails', 'FAQ', 'Feeds', 'Filters',
        'ForecastManagerWorksheets', 'ForecastWorksheets', 'Forecasts',
        'Home', 'KBDocuments', 'Library', 'Newsletters', 'Notifications',
        'OAuthKeys', 'OAuthTokens', 'PdfManager', 'Queues',
        'Contracts', 'Documents', 'Notes', // don't want to deal with files right now...
        'Reports', 'Reports_1', 'SavedSearch', 'Styleguide', 'Subscriptions',
        'SugarFavorites', 'Sugar_Favorites', 'TrackerPerfs', 'TrackerQueries', 'TrackerSessions',
        'UserSignatures', 'WebLogicHooks', 'Words', 'WorkFlow', 'Worksheet', 'iFrames',
    );

    /**
     * Sugar fields we do not want the user to interact with
     * @var array
     */
    protected static $blacklisted_fields = array(
        'id', 'deleted', 'date_entered', 'date_modified', 'following',
        'favorite_link', 'following_link',
        'assigned_user_id', 'assigned_user_link', 'assigned_user_name',
        'email_addresses_primary', 'email_opt_out', 'invalid_email',
        'my_favorite', 'parent_id', 'parent_name',
        'team_id', 'team_link', 'team_name', 'team_set_id', 'teams',
        'modified_user_id', 'user_favorites', 'created_by'
    );

    /**
     * Sugar field types we do not want the user to interact with
     * @var array
     */
    protected static $blacklisted_field_types = array(
        'link', 'relate'
    );


    /**
     * Filters the Sugar metadata to remove system modules
     *
     * @param array $module_list Module metatdata array keyed by module name
     * @return array mixed
     */
    public static function filter_module_metadata($module_list)
    {
        foreach ($module_list as $module_name => $defs) {
            if (in_array($module_name, self::$blacklisted_modules)) {
                unset($module_list[$module_name]);
            }
        }
        return $module_list;
    }

    /**
     * @param array $field_list  Field list metadata array keyed by field name
     * @return array mixed
     */
    public static function filter_field_list($field_list)
    {
        foreach ($field_list as $field_name => $defs) {
            if (in_array($field_name, self::$blacklisted_fields)
                || (isset($defs['type']) && in_array($defs['type'], self::$blacklisted_field_types))) {
                unset($field_list[$field_name]);
            }
        }
        return $field_list;
    }
} 