
/* VAR @BASE_URL */
var base_url = function() {
   var pathparts = location.pathname.split('/');
   if (location.host == 'localhost') {
      var url = location.origin + '/' + pathparts[1].trim('/') + '/'; // localhost
   } else if (location.host == 'demo.samawacreative.com') {
      var url = location.origin + '/2019/sarmansys/'; // domain
   } else if (location.host == 'spk-ahp.dev') {
      var url = location.origin + '/'; // domain
   } else if (location.host == 'spk-ahp-master.dev') {
      var url = location.origin + '/'; // domain
   } else {
      var url = location.origin + '/'; // domain
   }
   return url;
}