$(document).ready(function() {
    
    var timerid;
    var feedstoserver;
    $("#submiturl").on('click',function() {
        $('#submiturl').prop('disabled', true);

        
        $("#rssfeedurl").on("input",function(e){
            var value = $(this).val();
            if($(this).data("lastval")!= value){

                $(this).data("lastval",value);        
                clearTimeout(timerid);

                timerid = setTimeout(function() {
                    $('#submiturl').prop('disabled', false);
                    location.reload();  
                },500);
            };
        });

            var url = $("#rssfeedurl").val();

            feednami.load(url,function(result){
                if(result.error) {
                    console.log(result.error);
                } 
                else {
                    var entries = result.feed.entries;
                        var tr;
                            for (var i = 0; i < entries.length; i++) {
                                tr = $('<tr/>');
                                tr.append("<td>" + (i+1) + "</td>");
                                tr.append("<td>" + entries[i].title + "</td>");
                                tr.append("<td><a>" + entries[i].link + "</a></td>");
                                tr.append("<td>" + entries[i].description + "</td>");
                                $('table').append(tr);
                                var feedsObj = { 'id' : (i+1) , 'title' : entries[i].title , 
                                'link' : entries[i].link , 'description' : entries[i].description };                    
                                feedstoserver += JSON.stringify(feedsObj);
                            }
                            $("#savefeed").on('click', function() {

                                $.ajax({
                                        url: 'index.php',
                                        data: {my_json_data: feedstoserver},
                                        type: 'POST',
                                        success:function(data){
                                            console.log('AJAX SUCCESS');
                                        }, 
                                        complete : function(data){
                                            console.log('AJAX COMPLETE');
                                        }
                                });

                            });
                             
                            //console.log(feedstoserver);
                    }
            });
            
    });

});