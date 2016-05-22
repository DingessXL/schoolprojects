function test(e) {
    if(e=="Tracer"){
        $('#reason').load('/overwatch/textfiles/Tracer.txt');
    }
    else if(e=="Widowmaker")
    {
        $('#reason').load('/overwatch/textfiles/Widowmaker.txt');
    }
    else if(e=="Roadhog")
    {
        $('#reason').load('/overwatch/textfiles/Roadhog.txt');
    }
    else if(e=="Mercy")
    {
        $('#reason').load('/overwatch/textfiles/Mercy.txt');
    }
    else if(e=="Genji")
    {
        $('#reason').load('/overwatch/textfiles/Genji.txt');
    }
    else if(e=="Mei")
    {
        $('#reason').load('/overwatch/textfiles/Mei.txt');
    }
    else if(e=="Junkrat")
    {
        $('#reason').load('/overwatch/textfiles/Junkrat.txt');
    }
    else if(e=="Bastion")
    {
        $('#reason').load('/overwatch/textfiles/Bastion.txt');
    }
    else if(e=="Reinhardt")
    {
        $('#reason').load('/overwatch/textfiles/Reinhardt.txt');
    }
    else if(e=="Lucio")
    {
        $('#reason').load('/overwatch/textfiles/Lucio.txt');
    }
    else if(e=="Pharah")
    {
        $('#reason').load('/overwatch/textfiles/Pharah.txt');
    }
    else if(e=="Symmetra")
    {
        $('#reason').load('/overwatch/textfiles/Symmetra.txt');
    }
    else if(e=="Soldier76")
    {
        $('#reason').load('/overwatch/textfiles/Soldier76.txt');
    }
    else if(e=="McCree")
    {
        $('#reason').load('/overwatch/textfiles/McCree.txt');
    }
    else if(e=="Torbjorn")
    {
        $('#reason').load('/overwatch/textfiles/Torbjorn.txt');
    }
    else if(e=="DVa")
    {
        $('#reason').load('/overwatch/textfiles/DVa.txt');
    }
    else if(e=="Hanzo")
    {
        $('#reason').load('/overwatch/textfiles/Hanzo.txt');
    }
    else if(e=="Winston")
    {
        $('#reason').load('/overwatch/textfiles/Winston.txt');
    }
    else if(e=="Reaper")
    {
        $('#reason').load('/overwatch/textfiles/Reaper.txt');
    }
    else if(e=="Zarya")
    {
        $('#reason').load('/overwatch/textfiles/Zarya.txt');
    }
    else{
        $('#reason').html('not tracer');
    }
}
function back(){
    $('#reason').load('/overwatch/back.txt');
}