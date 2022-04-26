# tryphp
```
call plug#begin()
Plug 'tpope/vim-sensible'
Plug 'Shougo/ddc.vim'
Plug 'vim-denops/denops.vim'
Plug 'Shougo/ddc-around'
Plug 'Shougo/ddc-matcher_head'
Plug 'Shougo/pum.vim'
Plug 'LumaKernel/ddc-file'
Plug 'Shougo/ddc-sorter_rank'
Plug 'Shougo/ddc-converter_remove_overlap'
Plug 'prabirshrestha/vim-lsp'
Plug 'mattn/vim-lsp-settings'
Plug 'preservim/nerdtree'
call plug#end()

call plug#('preservim/nerdtree')
call plug#('Shougo/ddc.vim')
call plug#('vim-denops/denops.vim')
call plug#('Shougo/pum.vim')
call plug#('Shougo/ddc-around')
call plug#('LumaKernel/ddc-file')
call plug#('Shougo/ddc-matcher_head')
call plug#('Shougo/ddc-sorter_rank')
call plug#('Shougo/ddc-converter_remove_overlap')
call plug#('prabirshrestha/vim-lsp')
call plug#('mattn/vim-lsp-settings')

call ddc#custom#patch_global('completionMenu', 'pum.vim')
call ddc#custom#patch_global('sources', [
 \ 'around',
 \ 'vim-lsp',
 \ 'file'
 \ ])
call ddc#custom#patch_global('sourceOptions', {
 \ '_': {
 \   'matchers': ['matcher_head'],
 \   'sorters': ['sorter_rank'],
 \   'converters': ['converter_remove_overlap'],
 \ },
 \ 'around': {'mark': 'Around'},
 \ 'vim-lsp': {
 \   'mark': 'LSP', 
 \   'matchers': ['matcher_head'],
 \   'forceCompletionPattern': '\.|:|->|"\w+/*'
 \ },
 \ 'file': {
 \   'mark': 'file',
 \   'isVolatile': v:true, 
 \   'forceCompletionPattern': '\S/\S*'
 \ }})
"====補完機能設定===
call ddc#enable()
inoremap <C-f> <Cmd>call pum#map#insert_relative(+1)<CR>
inoremap <C-d> <Cmd>call pum#map#insert_relative(-1)<CR>

"===カラースキーム設定===
syntax on
colorscheme molokai

"===== マウス設定 =====
set mouse=a
set ttymouse=xterm

"===== 検索設定 =====
set ignorecase "大文字、小文字の区別をしない
set smartcase "大文字が含まれている場合は区別する
set wrapscan "検索時に最後まで行ったら最初に戻る
set hlsearch "検索した文字を強調
set incsearch "インクリメンタルサーチを有効にする

"入力モード時にcontrolキーを押しながら、h,j,k,lでカーソル移動
inoremap <C-j> <Down>
inoremap <C-k> <Up>
inoremap <C-h> <Left>
inoremap <C-l> <Right>

"===== その他 =====
"履歴を100件保存
set history=100
set clipboard+=unnamed "コピーしたときはクリップボードを使用
set nobackup "バックアップファイルを作らない
set noswapfile "スワップファイルを作らない
set autoread "編集中のファイルが変更されたら、自動的に読み込み直す

"====NERDTreeToggleの設定===
nnoremap <Space><Space> :NERDTreeToggle<CR>

"====インデント系の設定====
"set smartindent
set shiftwidth=2

"====タブ系の設定====
set tabstop=2
"cmd + v +> tabでタブ文字の入力
set expandtab

"===その他====
set number
set virtualedit=onemore
set backspace=indent,eol,start
set wildmenu
set shellslash
set showcmd
set fenc=UTF-8

"===補完系===
inoremap <silent> jj <ESC>
inoremap { {}<Left>
inoremap {<Enter> {}<Left><CR><ESC><S-o>
inoremap ( ()<Left>
"inoremap (<Enter> ()<Left><CR><ESC><S-o>
inoremap [ []<Left>
inoremap " ""<Left>
inoremap ' ''<Left>

```
