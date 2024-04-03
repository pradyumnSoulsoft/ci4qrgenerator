function setActivityProfileDropdown(list) {
  
  var options = '';
  
  for (let k of list.keys()) {
    
    let activity = list.get(k);

    // console.log(activity.activity_title);

    if(activity.is_active==1){
          options+=`<option value="`+activity.id+`">`+activity.activity_title+`</option>`;
        }
        
      }
        
    
    $('#activity_id').html(options);
    
}

// console.log(activityList);
setActivityProfileDropdown(activityList);