// 0. 先到 https://dev.twitch.tv/console/apps/create 申請一組client ID.
// 1. 在透過底下的指令先確定可以在terminal上顯示出來
// curl --request GET 'https://api.twitch.tv/helix/games/top' --header 'Client-ID:s2xusiifgc7v1qjkdfdn5drwrmams6'
// 2. 存入到twitch.js中,獲得一組資料
// curl --request GET 'https://api.twitch.tv/helix/games/top' --header 'Client-ID:s2xusiifgc7v1qjkdfdn5drwrmams6' > twitch.js
// 3. 對這個函數命名為body,並且放在hw4的js文件中
// 4. typeof確認過後為物件. 並且在Twitch API參考資料中"Get TOP Games,裡面的顯示只能列出前20項熱門遊戲,因此用for迴圈把前20項都print出來

const body = {
  data:
  [{ id: '33214', name: 'Fortnite', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/Fortnite-{width}x{height}.jpg' },
    { id: '32982', name: 'Grand Theft Auto V', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/Grand%20Theft%20Auto%20V-{width}x{height}.jpg' },
    { id: '21779', name: 'League of Legends', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/League%20of%20Legends-{width}x{height}.jpg' }, { id: '509658', name: 'Just Chatting', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/Just%20Chatting-{width}x{height}.jpg' }, { id: '488552', name: 'Overwatch', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/Overwatch-{width}x{height}.jpg' }, { id: '138585', name: 'Hearthstone', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/Hearthstone-{width}x{height}.jpg' }, { id: '461067', name: 'Tekken 7', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/Tekken%207-{width}x{height}.jpg' }, { id: '29595', name: 'Dota 2', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/Dota%202-{width}x{height}.jpg' }, { id: '65654', name: 'The Elder Scrolls Online', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/The%20Elder%20Scrolls%20Online-{width}x{height}.jpg' }, { id: '490422', name: 'StarCraft II', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II-{width}x{height}.jpg' }, { id: '493057', name: "PLAYERUNKNOWN'S BATTLEGROUNDS", box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/PLAYERUNKNOWN%27S%20BATTLEGROUNDS-{width}x{height}.jpg' }, { id: '510578', name: 'Mortal Kombat 11', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/Mortal%20Kombat%2011-{width}x{height}.jpg' }, { id: '20593', name: 'Dragon Quest IV: Chapters of the Chosen', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/./Dragon%20Quest%20IV:%20Chapters%20of%20the%20Chosen-{width}x{height}.jpg' }, { id: '29307', name: 'Path of Exile', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/Path%20of%20Exile-{width}x{height}.jpg' }, { id: '511224', name: 'Apex Legends', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/Apex%20Legends-{width}x{height}.jpg' }, { id: '32399', name: 'Counter-Strike: Global Offensive', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/./Counter-Strike:%20Global%20Offensive-{width}x{height}.jpg' }, { id: '499831', name: 'Forager', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/Forager-{width}x{height}.jpg' }, { id: '511748', name: 'Auto Chess', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/Auto%20Chess-{width}x{height}.jpg' }, { id: '18122', name: 'World of Warcraft', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/World%20of%20Warcraft-{width}x{height}.jpg' }, { id: '30921', name: 'Rocket League', box_art_url: 'https://static-cdn.jtvnw.net/ttv-boxart/Rocket%20League-{width}x{height}.jpg' }],
  pagination: { cursor: 'eyJiIjpudWxsLCJhIjp7Ik9mZnNldCI6MjB9fQ' }
}
for (let i = 0; i < 20; i += 1) {
  console.log(`${body.data[i].id} ${body.data[i].name}`)
}
