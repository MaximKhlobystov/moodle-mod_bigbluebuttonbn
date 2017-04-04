YUI.add("moodle-mod_bigbluebuttonbn-recordings",function(e,t){M.mod_bigbluebuttonbn=M.mod_bigbluebuttonbn||{},M.mod_bigbluebuttonbn.recordings={datasource:null,locale:"en",profilefeatures:{},datatable:{},init:function(t){this.datasource=new e.DataSource.Get({source:M.cfg.wwwroot+"/mod/bigbluebuttonbn/bbb_broker.php?"}),this.locale=t.locale,this.profilefeatures=t.profile_features,this.datatable.columns=t.columns,this.datatable.data=t.data,t.recordings_html===!1&&(this.profilefeatures.includes("all")||this.profilefeatures.includes("showrecordings"))&&this.datatable_init()},datatable_init:function(){var e={weekday:"long",year:"numeric",month:"long",day:"numeric"},t=this.datatable.columns,n=this.datatable.data;for(var r=0;r<n.length;r++){var i=new Date(n[r].date);n[r].date=i.toLocaleDateString(this.locale,e)}YUI({lang:this.locale}).use("datatable","datatable-sort","datatable-paginator","datatype-number",function(e){var r=(new e.DataTable({width:"1075px",columns:t,data:n,rowsPerPage:10,paginatorLocation:["header","footer"]})).render("#bigbluebuttonbn_yui_table");return r})},recording_action:function(t){var n=e.one(t),r=n.getAttribute("data-action"),i=n.ancestor("div"),s=i.getAttribute("data-recordingid"),o=i.getAttribute("data-meetingid");return r==="import"?this.recording_import({recordingid:s}):r==="publish"?this.recording_publish({recordingid:s,meetingid:o}):r==="unpublish"?this.recording_unpublish({recordingid:s,meetingid:o}):r==="update"?this.recording_update({recordingid:s,meetingid:o}):r==="delete"?this.recording_delete({recordingid:s,meetingid:o}):null},recording_delete:function(e){var t=new M.core.confirm({modal:!0,centered:!0,question:this.recording_confirmation_message("delete",e.recordingid)});t.on("complete-yes",function(){var t={action:"delete",recordingid:e.recordingid,meetingid:e.meetingid,goalstate:!1};M.mod_bigbluebuttonbn.recordings.recording_action_inprocess(t),M.mod_bigbluebuttonbn.broker.recording_action_perform()},this)},recording_publish:function(e){var t={action:"publish",recordingid:e.recordingid,meetingid:e.meetingid,goalstate:!0};M.mod_bigbluebuttonbn.recordings.recording_action_inprocess(t),M.mod_bigbluebuttonbn.broker.recording_action_perform(t)},recording_unpublish:function(e){var t=new M.core.confirm({modal:!0,centered:!0,question:this.recording_confirmation_message("unpublish",e.recordingid)});t.on("complete-yes",function(){var t={action:"unpublish",recordingid:e.recordingid,meetingid:e.meetingid,goalstate:!1};M.mod_bigbluebuttonbn.recordings.recording_action_inprocess(t),M.mod_bigbluebuttonbn.broker.recording_action_perform(t)},this)},recording_update:function(e){console.info("Updating"+e.recordingid+"...")},recording_confirmation_message:function(t,n){var r=M.util.get_string("view_recording_"+t+"_confirmation","bigbluebuttonbn");if(r==="undefined")return"";var i=e.one("#playbacks-"+n).get("dataset").imported==="true",s=M.util.get_string("view_recording","bigbluebuttonbn");i&&(s=M.util.get_string("view_recording_link","bigbluebuttonbn")),r=r.replace("{$a}",s);if(t==="publish"||t==="delete"){var o=e.one("#recording-link-"+t+"-"+n).get("dataset").links,u=M.util.get_string("view_recording_"+t+"_confirmation_warning_p","bigbluebuttonbn");o==1&&(u=M.util.get_string("view_recording_"+t+"_confirmation_warning_s","bigbluebuttonbn")),u=u.replace("{$a}",o)+". ",r=u+"\n\n"+r}return r},recording_action_inprocess:function(t){var n=e.one("img#recording-"+t.action+"-"+t.recordingid);console.info(n);var r=M.util.get_string("view_recording_list_actionbar_unpublishing","bigbluebuttonbn");t.action=="publish"&&(r=M.util.get_string("view_recording_list_actionbar_publishing","bigbluebuttonbn")),t.action=="delete"&&(r=M.util.get_string("view_recording_list_actionbar_deleting","bigbluebuttonbn")),n.setAttribute("alt",r),n.setAttribute("title",r),n.setAttribute("data-src",n.getAttribute("src")),n.setAttribute("src",M.cfg.wwwroot+"/mod/bigbluebuttonbn/pix/processing16.gif");var i=e.one("a#recording-"+t.action+"-"+t.recordingid);i.setAttribute("data-onlcick",i.getAttribute("onclick")),i.setAttribute("onclick","")},recording_action_completed:function(t){var n=e.one("img#recording-"+t.action+"-"+t.recordingid),r=n.getAttribute("data-src"),i=e.one("a#recording-"+t.action+"-"+t.recordingid),s=i.getAttribute("data-onlcick"),o="publish",u="show",a=M.util.get_string("view_recording_list_actionbar_publish","bigbluebuttonbn");e.one("#playbacks-"+t.recordingid).hide(),e.one("#preview-"+t.recordingid).hide(),t.action==="publish"&&(o="unpublish",u="hide",a=M.util.get_string("view_recording_list_actionbar_unpublish","bigbluebuttonbn"),e.one("#playbacks-"+t.recordingid).show(),e.one("#preview-"+t.recordingid).show()),n.setAttribute("id","recording-"+o+"-"+t.recordingid),i.setAttribute("id","recording-"+o+"-"+t.recordingid),i.setAttribute("data-action",o),n.setAttribute("src",r.substring(0,r.length-4)+u),n.setAttribute("alt",a),n.setAttribute("title",a),i.setAttribute("onclick",s.replace(t.action,o))},recording_action_failed:function(t){var n=new M.core.alert({title:M.util.get_string("error","moodle"),message:t.message});n.show();var r=e.one("img#recording-"+t.action+"-"+t.recordingid),i=e.one("a#recording-"+t.action+"-"+t.recordingid),s=M.util.get_string("view_recording_list_actionbar_unpublish","bigbluebuttonbn");t.action==="publish"&&(s=M.util.get_string("view_recording_list_actionbar_publish","bigbluebuttonbn")),r.setAttribute("id","recording-"+t.action+"-"+t.recordingid),i.setAttribute("id","recording-"+t.action+"-"+t.recordingid),i.setAttribute("data-action",t.action),r.setAttribute("src",r.getAttribute("data-src")),r.setAttribute("alt",s),r.setAttribute("title",s),i.setAttribute("onclick",i.getAttribute("data-onlcick"))},recording_delete_completed:function(t){e.one("#recording-td-"+t.recordingid).remove()},recording_edit:function(t){var n=e.one(t),r=n.ancestor("div");console.info("Editing "+r.getAttribute("data-target")+"...");var i=r.one("> span");i.hide(),n.hide();var s=e.Node.create('<input type="text" class="form-control"></input>'
);s.setAttribute("id",r.getAttribute("id")),s.setAttribute("value",i.getHTML()),s.setAttribute("onkeydown","M.mod_bigbluebuttonbn.recordings.recording_edit_keydown(this);"),r.append(s)},recording_edit_keydown:function(t){if(event.keyCode==13){var n=t.value,r=e.one(t),i=r.ancestor("div"),s=i.one("> span"),o=i.one("> a");return setTimeout(function(){M.mod_bigbluebuttonbn.broker.recording_action("update",i.getAttribute("data-recordingid"),i.getAttribute("data-meetingid")),s.setHTML(n),r.hide(),s.show(),o.show()},0)}}}},"@VERSION@",{requires:["base","node","datasource-get","datasource-jsonschema","datasource-polling","moodle-core-notification"]});