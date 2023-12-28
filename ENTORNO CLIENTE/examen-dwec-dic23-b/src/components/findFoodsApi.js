export function findFoodsApi(input, url){
    fetch(url)
    .then((response) => {
        if (!response.ok) {
        throw new Error("Could not find any food");
        }
        return response.json();
    })
    .then((data) => {
        const arrId = [];
        data.forEach(element => arrId.push(element.id))
        console.log(arrId);
    });
}