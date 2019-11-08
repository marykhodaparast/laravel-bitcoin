{{--  $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('ajaxResponse') }}",
//data: [$('#first').val(),$('#firstSelect').val(),$('secondSelect').val()],
data: {
first: $('#first').val(),
second: $('#firstSelect').val(),
third: $('#secondSelect').val()
},
async: false,
success: function(data) {
console.log("success ", data);
$('#second').val(data);
},
error: function(data) {
console.log("error ", data.responseText);

}
}); --}}
