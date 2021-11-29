//функция которая работает нормально
// export function clear(hot1,hot2)
// {if (typeof hot2 != "undefined")
//     {
//         hot1.clear();
//         hot2.clear();}
//     else
//     {
//         hot1.clear();
//     }
// }
//та же функция, но ее попытался оптимизировать

export function clearNew (hotsarray) {

    for (const hotInstances of hotsarray) {
        hotInstances.clear();
    }
}