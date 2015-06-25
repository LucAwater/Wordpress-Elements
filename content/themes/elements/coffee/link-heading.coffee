$ ->
  $('a:has(div, img)').addClass "nope"
  $('a:has(h1):not(.nope)').addClass "link-h1"
  $('a:has(h2):not(.nope)').addClass "link-h2"
  $('a:has(h3):not(.nope)').addClass "link-h3"
  $('a:has(p):not(.nope)').addClass "link-p"
  $('a').removeClass "nope"