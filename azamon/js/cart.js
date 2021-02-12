$(function() {
    $(".btn").click(function() {
        var cur = $(".btn").index($(this)); // get the index of the clicked button within the collection
        var test = $(".btn").eq(cur).val(); // find the input with the contentid class at the same index and get its value
        alert(test);
    });
});