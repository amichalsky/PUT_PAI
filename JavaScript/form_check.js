var fields = new Array("imię","nazwisko","poprawny e-mail", "kod pocztowy", "ulice/osiedle", "miasto");
var elem_names = new Array("f_imie","f_nazwisko","f_email","f_kod","f_ulica","f_miasto");
var ret;

function isWhiteSpaceOrEmpty(str)
{
    return /^[\s\t\r\n]*$/.test(str);
}

function isEmailInvalid(str)
{
    let email = /^[a-zA-Z_0-9\.]+@[a-zA-Z_0-9\.]+\.[a-zA-Z][a-zA-Z]+$/;
    if (email.test(str))
        return false;
    else
        return true;
}

function checkStringAndFocus(obj, msg, f)
{
    let str = obj.value;
    let errorFieldName = "e_"+ obj.name.substr(2, obj.name.length);
    if(f(str))
    {
        document.getElementById(errorFieldName).innerHTML = "Podaj " + msg + "!";
        obj.focus();
        return false;
    }
    else
    {
        document.getElementById(errorFieldName).innerHTML = "";
        return true;
    }
}

function validate(form) 
{
    ret = true;
    for(var i = 0; i < elem_names.length; i++)
    {
        if(elem_names[i]!="f_email")
        {
            if(!checkStringAndFocus(form.elements[elem_names[i]], fields[i], isWhiteSpaceOrEmpty))
                ret = false;
        }
        else 
        {
            if(!checkStringAndFocus(form.elements[elem_names[i]], fields[i], isEmailInvalid))
                ret = false;
        }
    }
    return ret;
}

function showElement(e)
{
    document.getElementById(e).style.visibility = 'visible';
}

function hideElement(e)
{
    document.getElementById(e).style.visibility = 'hidden';
}

function alterRows(i, e)
{
    if(e)
    {
        if(i % 2 == 1)
        {
            e.setAttribute("style", "background-color: Aqua;");
        }
        e = e.nextSibling;
        while(e && e.nodeType != 1)
        {
            e = e.nextSibling;
        }
        alterRows(++i, e);
    }
}

function nextNode(e)
{
    while(e && e.nodeType != 1)
    {
        e = e.nextSibling;
    }
    return e;
}

function prevNode(e)
{
    while(e && e.nodeType != 1)
    {
        e = e.previousSibling;
    }
    return e;
}

function swapRows(b)
{
    let tab = prevNode(b.previousSibling);
    let tBody = nextNode(tab.firstChild);
    let lastNode = prevNode(tBody.lastChild);
    tBody.removeChild(lastNode);
    let firstNode = nextNode(tBody.firstChild);
    tBody.insertBefore(lastNode, firstNode);
}

function cnt(form, msg, maxSize)
{
    if(form.value.length > maxSize)
        form.value = form.value.substring(0, maxSize);
    else
        msg.innerHTML = maxSize - form.value.length;
}