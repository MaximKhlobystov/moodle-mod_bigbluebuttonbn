<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Settings for BigBlueButtonBN.
 *
 * @author    Fred Dixon  (ffdixon [at] blindsidenetworks [dt] com)
 * @author    Jesus Federico  (jesus [at] blindsidenetworks [dt] com)
 * @copyright 2010-2017 Blindside Networks Inc
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v2 or later
 */

defined('MOODLE_INTERNAL') || die;

global $CFG;

require_once(dirname(__FILE__).'/locallib.php');

if ($ADMIN->fulltree) {
    if (!isset($CFG->bigbluebuttonbn['server_url']) ||
        !isset($CFG->bigbluebuttonbn['shared_secret'])) {
        $settings->add(new admin_setting_heading('bigbluebuttonbn_config_general',
                get_string('config_general', 'bigbluebuttonbn'),
                get_string('config_general_description', 'bigbluebuttonbn')));

        if (!isset($CFG->bigbluebuttonbn['server_url'])) {
            $settings->add(new admin_setting_configtext('bigbluebuttonbn_server_url',
                    get_string('config_server_url', 'bigbluebuttonbn'),
                    get_string('config_server_url_description', 'bigbluebuttonbn'),
                    BIGBLUEBUTTONBN_DEFAULT_SERVER_URL));
        }
        if (!isset($CFG->bigbluebuttonbn['shared_secret'])) {
            $settings->add(new admin_setting_configtext('bigbluebuttonbn_shared_secret',
                    get_string('config_shared_secret', 'bigbluebuttonbn'),
                    get_string('config_shared_secret_description', 'bigbluebuttonbn'),
                    BIGBLUEBUTTONBN_DEFAULT_SHARED_SECRET));
        }
    }

    // Configuration for 'recording' feature.
    if (!isset($CFG->bigbluebuttonbn['recording_default']) ||
        !isset($CFG->bigbluebuttonbn['recording_editable']) ||
        !isset($CFG->bigbluebuttonbn['recording_icons_enabled'])) {
        $settings->add(new admin_setting_heading('bigbluebuttonbn_recording',
                get_string('config_feature_recording', 'bigbluebuttonbn'),
                get_string('config_feature_recording_description', 'bigbluebuttonbn')));

        if (!isset($CFG->bigbluebuttonbn['recording_default'])) {
            // Default value for 'recording' feature.
            $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_recording_default',
                    get_string('config_feature_recording_default', 'bigbluebuttonbn'),
                    get_string('config_feature_recording_default_description', 'bigbluebuttonbn'),
                    1));
        }
        if (!isset($CFG->bigbluebuttonbn['recording_editable'])) {
            // UI for 'recording' feature.
            $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_recording_editable',
                    get_string('config_feature_recording_editable', 'bigbluebuttonbn'),
                    get_string('config_feature_recording_editable_description', 'bigbluebuttonbn'),
                    1));
        }
        if (!isset($CFG->bigbluebuttonbn['recording_icons_enabled'])) {
            // Front panel for 'recording' managment feature.
            $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_recording_icons_enabled',
                    get_string('config_feature_recording_icons_enabled', 'bigbluebuttonbn'),
                    get_string('config_feature_recording_icons_enabled_description', 'bigbluebuttonbn'),
                    1));
        }
    }

    // Configuration for 'import recordings' feature.
    if (!isset($CFG->bigbluebuttonbn['importrecordings_enabled']) ||
        !isset($CFG->bigbluebuttonbn['importrecordings_from_deleted_enabled'])) {
        $settings->add(new admin_setting_heading('bigbluebuttonbn_importrecordings',
                get_string('config_feature_importrecordings', 'bigbluebuttonbn'),
                get_string('config_feature_importrecordings_description', 'bigbluebuttonbn')));

        if (!isset($CFG->bigbluebuttonbn['importrecordings_enabled'])) {
            // Default value for 'import recordings' feature.
            $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_importrecordings_enabled',
                    get_string('config_feature_importrecordings_enabled', 'bigbluebuttonbn'),
                    get_string('config_feature_importrecordings_enabled_description', 'bigbluebuttonbn'),
                    0));
        }
        if (!isset($CFG->bigbluebuttonbn['importrecordings_from_deleted_enabled'])) {
            // Consider deleted activities for 'import recordings' feature.
            $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_importrecordings_from_deleted_enabled',
                    get_string('config_feature_importrecordings_from_deleted_enabled', 'bigbluebuttonbn'),
                    get_string('config_feature_importrecordings_from_deleted_enabled_description', 'bigbluebuttonbn'),
                    0));
        }
    }

    // Configuration for 'show recordings' feature.
    if (!isset($CFG->bigbluebuttonbn['recordings_enabled']) ||
        !isset($CFG->bigbluebuttonbn['showrecordings_from_deleted_enabled'])) {
        $settings->add(new admin_setting_heading('bigbluebuttonbn_importrecordings',
                get_string('config_feature_importrecordings', 'bigbluebuttonbn'),
                get_string('config_feature_importrecordings_description', 'bigbluebuttonbn')));

        if (!isset($CFG->bigbluebuttonbn['showrecordings_enabled'])) {
            // Default value for 'import recordings' feature.
            $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_importrecordings_enabled',
                    get_string('config_feature_importrecordings_enabled', 'bigbluebuttonbn'),
                    get_string('config_feature_importrecordings_enabled_description', 'bigbluebuttonbn'),
                    0));
        }
        if (!isset($CFG->bigbluebuttonbn['showrecordings_from_deleted_enabled'])) {
            // Consider deleted activities for 'import recordings' feature.
            $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_importrecordings_from_deleted_enabled',
                    get_string('config_feature_importrecordings_from_deleted_enabled', 'bigbluebuttonbn'),
                    get_string('config_feature_importrecordings_from_deleted_enabled_description', 'bigbluebuttonbn'),
                    0));
        }
    }

    if (!isset($CFG->bigbluebuttonbn['recordings_html_default']) ||
        !isset($CFG->bigbluebuttonbn['recordings_html_editable']) ||
        !isset($CFG->bigbluebuttonbn['recordings_deleted_default']) ||
        !isset($CFG->bigbluebuttonbn['recordings_deleted_editable']) ||
          !isset($CFG->bigbluebuttonbn['recordings_imported_default']) ||
          !isset($CFG->bigbluebuttonbn['recordings_imported_editable'])) {
        $settings->add(new admin_setting_heading('bigbluebuttonbn_recordings',
                    get_string('config_feature_recordings', 'bigbluebuttonbn'),
                    get_string('config_feature_recordings_description', 'bigbluebuttonbn')));

        if (!isset($CFG->bigbluebuttonbn['recordings_html_default'])) {
            $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_recordings_html_default',
                    get_string('config_feature_recordings_html_default', 'bigbluebuttonbn'),
                    get_string('config_feature_recordings_html_default_description', 'bigbluebuttonbn'),
                    1));
        }
        if (!isset($CFG->bigbluebuttonbn['recordings_html_editable'])) {
            // UI for 'recording' feature.
            $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_recordings_html_editable',
                    get_string('config_feature_recordings_html_editable', 'bigbluebuttonbn'),
                    get_string('config_feature_recordings_html_editable_description', 'bigbluebuttonbn'),
                    0));
        }

        if (!isset($CFG->bigbluebuttonbn['recordings_deleted_default'])) {
            $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_recordings_deleted_default',
                    get_string('config_feature_recordings_deleted_default', 'bigbluebuttonbn'),
                    get_string('config_feature_recordings_deleted_default_description', 'bigbluebuttonbn'),
                    1));
        }
        if (!isset($CFG->bigbluebuttonbn['recordings_deleted_editable'])) {
            // UI for 'recording' feature.
            $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_recordings_deleted_editable',
                    get_string('config_feature_recordings_deleted_editable', 'bigbluebuttonbn'),
                    get_string('config_feature_recordings_deleted_editable_description', 'bigbluebuttonbn'),
                    0));
        }

        if (!isset($CFG->bigbluebuttonbn['recordings_imported_default'])) {
            $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_recordings_imported_default',
                    get_string('config_feature_recordings_imported_default', 'bigbluebuttonbn'),
                    get_string('config_feature_recordings_imported_default_description', 'bigbluebuttonbn'),
                    0));
        }
        if (!isset($CFG->bigbluebuttonbn['recordings_imported_editable'])) {
            // UI for 'recording' feature.
            $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_recordings_imported_editable',
                    get_string('config_feature_recordings_imported_editable', 'bigbluebuttonbn'),
                    get_string('config_feature_recordings_imported_editable_description', 'bigbluebuttonbn'),
                    1));
        }

    }

    // Configuration for wait for moderator feature.
    if (!isset($CFG->bigbluebuttonbn['waitformoderator_default']) ||
        !isset($CFG->bigbluebuttonbn['waitformoderator_editable']) ||
        !isset($CFG->bigbluebuttonbn['waitformoderator_ping_interval']) ||
        !isset($CFG->bigbluebuttonbn['waitformoderator_cache_ttl'])) {
        $settings->add(new admin_setting_heading('bigbluebuttonbn_feature_waitformoderator',
                get_string('config_feature_waitformoderator', 'bigbluebuttonbn'),
                get_string('config_feature_waitformoderator_description', 'bigbluebuttonbn')));

        if (!isset($CFG->bigbluebuttonbn['waitformoderator_default'])) {
            // Default value for 'wait for moderator' feature.
            $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_waitformoderator_default',
                    get_string('config_feature_waitformoderator_default', 'bigbluebuttonbn'),
                    get_string('config_feature_waitformoderator_default_description', 'bigbluebuttonbn'),
                    0));
        }
        if (!isset($CFG->bigbluebuttonbn['waitformoderator_editable'])) {
            // UI for 'wait for moderator' feature.
            $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_waitformoderator_editable',
                    get_string('config_feature_waitformoderator_editable', 'bigbluebuttonbn'),
                    get_string('config_feature_waitformoderator_editable_description', 'bigbluebuttonbn'),
                    1));
        }
        if (!isset($CFG->bigbluebuttonbn['waitformoderator_ping_interval'])) {
            // Ping interval value for 'wait for moderator' feature.
            $settings->add(new admin_setting_configtext('bigbluebuttonbn_waitformoderator_ping_interval',
                    get_string('config_feature_waitformoderator_ping_interval', 'bigbluebuttonbn'),
                    get_string('config_feature_waitformoderator_ping_interval_description', 'bigbluebuttonbn'),
                    10, PARAM_INT));
        }
        if (!isset($CFG->bigbluebuttonbn['waitformoderator_cache_ttl'])) {
            // Cache TTL value for 'wait for moderator' feature.
            $settings->add(new admin_setting_configtext('bigbluebuttonbn_waitformoderator_cache_ttl',
                    get_string('config_feature_waitformoderator_cache_ttl', 'bigbluebuttonbn'),
                    get_string('config_feature_waitformoderator_cache_ttl_description', 'bigbluebuttonbn'),
                    60, PARAM_INT));
        }
    }

    // Configuration for "static voice bridge" feature.
    if (!isset($CFG->bigbluebuttonbn['voicebridge_editable'])) {
        $settings->add(new admin_setting_heading('bigbluebuttonbn_feature_voicebridge',
                get_string('config_feature_voicebridge', 'bigbluebuttonbn'),
                get_string('config_feature_voicebridge_description', 'bigbluebuttonbn')));

        // UI for establishing static voicebridge.
        $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_voicebridge_editable',
                get_string('config_feature_voicebridge_editable', 'bigbluebuttonbn'),
                get_string('config_feature_voicebridge_editable_description', 'bigbluebuttonbn'),
                0));
    }

    // Configuration for "preupload presentation" feature.
    if (!isset($CFG->bigbluebuttonbn['preuploadpresentation_enabled'])) {
        // This feature only works if curl is installed.
        if (extension_loaded('curl')) {
            $settings->add(new admin_setting_heading('bigbluebuttonbn_feature_preuploadpresentation',
                get_string('config_feature_preuploadpresentation', 'bigbluebuttonbn'),
                get_string('config_feature_preuploadpresentation_description', 'bigbluebuttonbn')
                ));

            // UI for 'preupload presentation' feature.
            $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_preuploadpresentation_enabled',
                get_string('config_feature_preuploadpresentation_enabled', 'bigbluebuttonbn'),
                get_string('config_feature_preuploadpresentation_enabled_description', 'bigbluebuttonbn'),
                0));

            // Default file for 'preupload presentation' feature.
        } else {
            $settings->add(new admin_setting_heading('bigbluebuttonbn_feature_preuploadpresentation',
                get_string('config_feature_preuploadpresentation', 'bigbluebuttonbn'),
                get_string('config_feature_preuploadpresentation_description', 'bigbluebuttonbn').'<br><br>'.
                '<div class="form-defaultinfo">'.get_string('config_warning_curl_not_installed', 'bigbluebuttonbn').'</div><br>'
                ));
        }
    }

    // Configuration for "user limit" feature.
    if (!isset($CFG->bigbluebuttonbn['userlimit_default']) ||
        !isset($CFG->bigbluebuttonbn['userlimit_editable'])) {
        $settings->add(new admin_setting_heading('config_userlimit',
                get_string('config_feature_userlimit', 'bigbluebuttonbn'),
                get_string('config_feature_userlimit_description', 'bigbluebuttonbn')));

        if (!isset($CFG->bigbluebuttonbn['userlimit_default'])) {
            // Default value for 'user limit' feature.
            $settings->add(new admin_setting_configtext('bigbluebuttonbn_userlimit_default',
                    get_string('config_feature_userlimit_default', 'bigbluebuttonbn'),
                    get_string('config_feature_userlimit_default_description', 'bigbluebuttonbn'),
                    0, PARAM_INT));
        }
        if (!isset($CFG->bigbluebuttonbn['userlimit_editable'])) {
            // UI for 'user limit' feature.
            $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_userlimit_editable',
                    get_string('config_feature_userlimit_editable', 'bigbluebuttonbn'),
                    get_string('config_feature_userlimit_editable_description', 'bigbluebuttonbn'),
                    0));
        }
    }

    // Configuration for "scheduled duration" feature.
    if (!isset($CFG->bigbluebuttonbn['scheduled_duration_enabled'])) {
        $settings->add(new admin_setting_heading('config_scheduled',
                get_string('config_scheduled', 'bigbluebuttonbn'),
                get_string('config_scheduled_description', 'bigbluebuttonbn')));

        // Calculated duration for 'scheduled session' feature.
        $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_scheduled_duration_enabled',
                get_string('config_scheduled_duration_enabled', 'bigbluebuttonbn'),
                get_string('config_scheduled_duration_enabled_description', 'bigbluebuttonbn'),
                1));

        // Compensatory time for 'scheduled session' feature.
        $settings->add(new admin_setting_configtext('bigbluebuttonbn_scheduled_duration_compensation',
                get_string('config_scheduled_duration_compensation', 'bigbluebuttonbn'),
                get_string('config_scheduled_duration_compensation_description', 'bigbluebuttonbn'),
                10, PARAM_INT));

        // Pre-opening time for 'scheduled session' feature.
        $settings->add(new admin_setting_configtext('bigbluebuttonbn_scheduled_pre_opening',
                get_string('config_scheduled_pre_opening', 'bigbluebuttonbn'),
                get_string('config_scheduled_pre_opening_description', 'bigbluebuttonbn'),
                10, PARAM_INT));
    }

    // Configuration for defining the default role/user that will be moderator on new activities.
    if (!isset($CFG->bigbluebuttonbn['moderator_default'])) {
        $settings->add(new admin_setting_heading('bigbluebuttonbn_permission',
                get_string('config_permission', 'bigbluebuttonbn'),
                get_string('config_permission_description', 'bigbluebuttonbn')));

        // UI for 'permissions' feature.
        $roles = bigbluebuttonbn_get_roles();
        $owner = array('0' => get_string('mod_form_field_participant_list_type_owner', 'bigbluebuttonbn'));
        $settings->add(new admin_setting_configmultiselect('bigbluebuttonbn_moderator_default',
                get_string('config_permission_moderator_default', 'bigbluebuttonbn'),
                get_string('config_permission_moderator_default_description', 'bigbluebuttonbn'),
                array_keys($owner), array_merge($owner, $roles)));
    }

    // Configuration for "send notifications" feature.
    if (!isset($CFG->bigbluebuttonbn['sendnotifications_enabled'])) {
        $settings->add(new admin_setting_heading('bigbluebuttonbn_feature_sendnotifications',
                get_string('config_feature_sendnotifications', 'bigbluebuttonbn'),
                get_string('config_feature_sendnotifications_description', 'bigbluebuttonbn')));

        // UI for 'send notifications' feature.
        $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_sendnotifications_enabled',
                get_string('config_feature_sendnotifications_enabled', 'bigbluebuttonbn'),
                get_string('config_feature_sendnotifications_enabled_description', 'bigbluebuttonbn'),
                1));
    }

    // Configuration for extended BN capabilities.
    if (bigbluebuttonbn_is_bn_server()) {
        // Configuration for 'notify users when recording ready' feature.
        if (!isset($CFG->bigbluebuttonbn['recordingready_enabled']) ||
            !isset($CFG->bigbluebuttonbn['meetingevents_enabled'])) {
            $settings->add(new admin_setting_heading('bigbluebuttonbn_extended_capabilities',
                    get_string('config_extended_capabilities', 'bigbluebuttonbn'),
                    get_string('config_extended_capabilities_description', 'bigbluebuttonbn')));

            // UI for 'notify users when recording ready' feature.
            if (!isset($CFG->bigbluebuttonbn['recordingready_enabled'])) {
                $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_recordingready_enabled',
                    get_string('config_extended_feature_recordingready_enabled', 'bigbluebuttonbn'),
                    get_string('config_extended_feature_recordingready_enabled_description', 'bigbluebuttonbn'),
                    0));
            }

            // UI for 'register meeting events' feature.
            if (!isset($CFG->bigbluebuttonbn['meetingevents_enabled'])) {
                $settings->add(new admin_setting_configcheckbox('bigbluebuttonbn_meetingevents_enabled',
                        get_string('config_extended_feature_meetingevents_enabled', 'bigbluebuttonbn'),
                        get_string('config_extended_feature_meetingevents_enabled_description', 'bigbluebuttonbn'),
                        0));
            }
        }
    }
}
