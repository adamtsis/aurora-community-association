function showRating(id) {
  document.getElementById('fdr_'+id).style.display = "block";
  document.getElementById('fdr_link_fdr_'+id).style.display = "none";
}

jQuery(function() {
  jQuery('.refresh-widget').click(function(){
    jQuery(this).parent().parent().find('.widget-data').load(jQuery(this).attr('data-url'));
    console.log(jQuery(this).attr('data-url'));

    var objToday = new Date(),
      weekday = new Array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'),
      dayOfWeek = weekday[objToday.getDay()],
      dayOfMonth = objToday.getDate(),
      months = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
      curMonth = months[objToday.getMonth()],
      curYear = objToday.getFullYear(),
      curHour = objToday.getHours(),
      curMinute = objToday.getMinutes(),
      curSeconds = objToday.getSeconds(),
      curZone = objToday.getTimezoneOffset();
    var rightnow = dayOfWeek + ", " + dayOfMonth + " " + curMonth + " " + curYear + " " + curHour + ":" + curMinute + ":" + curSeconds;

    jQuery(this).parent().find('abbr.timeago').remove();
    jQuery(this).parent().prepend('<abbr class="timeago">asd</div>');
    jQuery(this).parent().find('abbr.timeago').attr('title', rightnow).text(rightnow).timeago();
  });

  jQuery("abbr.timeago").timeago();
  
});