let s:white         = ["#ffffff", 231]
let s:grey0         = ["#878787", 102] 
let s:grey1         = ["#444444", 238] 
let s:grey2         = ["#303030", 235] 
let s:pink          = ["#ff87d7", 212]
let s:light_pink    = ["#ffafdf", 218]
let s:hot_pink      = ["#ff00ff", 201]
let s:red           = ["#ff005f", 197]
let s:teal          = ["#87ffff", 123]
let s:light_blue    = ["#afffff", 159]
let s:light_yellow  = ["#ffffaf", 229]
let s:mint          = ["#afffd7", 158]
let s:dark_mint     = ["#87af87",  49]
let s:lavender      = ["#dfafff", 183]
let s:gray_purple   = ["#afafd7", 146]
let s:dark_lavender = ["#875faf",  97]

let s:p = {'normal': {}, 'inactive': {}, 'insert': {}, 'replace': {}, 'visual': {}, 'tabline': {}}

" Normal Mode
" TODO Second part
let s:p.normal.left = [[s:grey1, s:teal], [s:teal, s:grey1]]
let s:p.normal.middle = [[ s:white, s:grey2 ]]
let s:p.normal.right = [[ s:grey2, s:teal], [s:white, s:grey2]]

"Insert Mode
let s:p.insert.left = [[ s:grey1, s:mint ], [s:teal, s:grey1]]
let s:p.insert.middle = [[ s:white, s:grey2 ]]
let s:p.insert.right = [[ s:grey2, s:mint], [s:white, s:grey2]]

" Visual Mode
let s:p.visual.left = [ [ s:grey1, s:pink ], [ s:teal, s:grey1 ] ]
let s:p.visual.middle = [[ s:white, s:grey2 ]]
let s:p.visual.right = [ [ s:grey2, s:pink ], [ s:white, s:grey2 ] ]

" Inactive Mode
" TODO FIX THIS BLOCK
let s:p.inactive.left =  [ [ s:grey0, s:grey1 ], [ s:grey0, s:grey1 ] ]
let s:p.inactive.middle = [ [ s:grey0, s:grey1 ] ]
let s:p.inactive.right = [ [ s:grey0, s:grey1 ], [ s:grey0, s:grey1 ] ]

" Replace Mode
let s:p.replace.left = [ [ s:grey1, s:lavender ], [ s:teal, s:grey1 ] ]
let s:p.replace.right = [ [ s:grey2, s:lavender ], [ s:white, s:grey2 ] ]

let g:lightline#colorscheme#vice#palette = lightline#colorscheme#flatten(s:p)
