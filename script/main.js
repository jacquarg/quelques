function initializeMenu() {
  document.getElementById("menu-btn").addEventListener("click" ,
    ev => {
      document.getElementById("menu").style.display = "block"
    })
  document.getElementById("close-menu").addEventListener("click" ,
    ev => {
      document.getElementById("menu").style.display = "none"
    })
}

function buildAphorism(data) {
    const words = ["je", "t'ai", "donne", "de", "moi", "tu", "as", "aussi", "pris", "beaucoup", "ca", "tu", "pourras", "le", "garder"];
    return words.map(word => buildATweet(word, data[word])).join(' ')
}

function buildATweet(word, tweetObj) {
    let tweet = tweetObj.text
    //https://stackoverflow.com/a/37511463
    // Z : normalize not on IE, old Android WebView...
    const normalized = tweet.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "")

    let index = undefined

    let search = normalized

    const searchTerm = (word == "t'ai")? "t’ai|t'ai" : word

    const regexp = new RegExp(`\\b(${searchTerm})\\b`, 'gi')
    let res = ""

    while((index = search.search(regexp)) != -1) {

        res += tweet.slice(0, index) + `<span class="word">${word}</span>`
        tweet = tweet.slice(index + word.length)

        search = search.slice(index + word.length)
    }
    res += tweet

    res = `<span class="username">@${tweetObj.username} : </span>${res}`
    return res
}
