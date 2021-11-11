export function clear(hot1,hot2)
{
    if (typeof hot2 != "undefined")
    {
        hot1.clear();
        hot2.clear();
        infoConsole.innerText = "Данные очищенны";
    }
    else
    {
        hot1.clear();
        infoConsole.innerText = "Данные очищенны";

    }
}