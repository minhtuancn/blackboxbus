
//checklist setter/getter method.
jQuery.fn.checklistValue = function(newvalue) {
var escapes = /[#;&,\.\+\*~':"!\^\$\[\]\(\)=>|\/\\]/;
var escapeID = function(string) {
var left = string.split(escapes,1)[0];
  if (left == string) return string;
  return left + '\\' + string.substr(left.length,1) + escapeID(string.substr(left.length+1));
};
if (typeof(newvalue) == 'undefined') {
var value = [];
this.each(function() {
$('#'+escapeID(this.id)+'_checklist',this).find('input:checkbox:checked').each(function() {
value.push($('label[for=' + escapeID($(this).attr('id')) + ']').html());
});
});
return value;
} else {
this.each(function() {
$('#'+escapeID(this.id)+'_checklist',this).find('input:checkbox').each(function() {
var checkbox = $(this);
var value = $('label[for=' + escapeID(checkbox.attr('id')) + ']').html();
$.each($.makeArray(newvalue),function(i,v) {
if (value == v) { 
checkbox.attr('checked',true);	
}
});
});	
});
return true;
}
};