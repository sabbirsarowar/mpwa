<div class="tab-pane fade show active" id="textmessage" role="tabpanel">
	<div class="d-flex flex-wrap gap-3 justify-content-center my-6"> 
		<button class="btn rounded-1 px-2 py-2 ra-tooltip w-8" data-ra-title="Bold" data-option="bold">
		<i class="icon-base ti tabler-bold icon-md"></i>
		</button>
		<button class="btn rounded-1 px-2 py-2 ra-tooltip w-8" data-ra-title="Italic" data-option="italic">
		<i class="icon-base ti tabler-italic icon-md"></i>
		</button>
		<button class="btn rounded-1 px-2 py-2 ra-tooltip w-8" data-ra-title="Underline" data-option="underline">
		<i class="icon-base ti tabler-underline icon-md"></i>
		</button>
		<button class="btn rounded-1 px-2 py-2 ra-tooltip w-8" data-ra-title="Strikethrough" data-option="strikeThrough">
		<i class="icon-base ti tabler-strikethrough icon-md"></i>
		</button>
		<button class="btn rounded-1 px-2 py-2 ra-tooltip w-8" data-ra-title="Sans Serif" style="font-size: 1.375rem;" data-option="sansserif">𝖳</button>
		<button class="btn rounded-1 px-2 py-2 ra-tooltip w-8" data-ra-title="Cursive" style="font-size: 1.375rem;" data-option="cursive">𝒯</button>
		<button class="btn rounded-1 px-2 py-2 ra-tooltip w-8" data-ra-title="Doublestruck" style="font-size: 1.375rem;" data-option="doublestruck">𝕋</button>
		<button class="btn rounded-1 px-2 py-2 ra-tooltip w-8" data-ra-title="Doublestruck 2" style="font-size: 1.375rem;" data-option="doublestruckAlt">⍑</button>
		<button class="btn rounded-1 px-2 py-2 ra-tooltip fw-light w-8" data-ra-title="Gothic" style="font-size: 1.375rem;" data-option="gothic">𝔗</button>
		<button class="btn rounded-1 px-2 py-2 ra-tooltip fw-light w-8" data-ra-title="Circled" style="font-size: 1.375rem;" data-option="circled">Ⓣ</button>
		<button class="btn rounded-1 px-2 py-2 ra-tooltip fw-light w-8" data-ra-title="Circled Negative" style="font-size: 1.375rem;" data-option="circledDark">🅣</button>
		<button class="btn rounded-1 px-2 py-2 ra-tooltip fw-light w-8" data-ra-title="Squared" style="font-size: 1.375rem;" data-option="squared">🅃</button>
		<button class="btn rounded-1 px-2 py-2 ra-tooltip fw-light w-8" data-ra-title="Squared Negative" style="font-size: 1.375rem;" data-option="squaredDark">🆃</button>
		<button class="btn rounded-1 px-2 py-2 ra-tooltip w-8" id="emoji-btn" style="font-size: 1.375rem;">😊</button>
	</div>
	<div class="card border border-info-subtle shadow-none mb-2">
		<div class="card-body d-flex flex-column gap-2">
			<div class="d-flex align-items-center gap-2">
				<i class="ti tabler-info-circle text-info fs-4"></i>
				<div class="fw-medium"><?php echo e(__('Message Variables & Spintax')); ?></div>
			</div>
			<div class="text-body-secondary small">
				<?php echo e(__('Use Spintax to randomize text with {A|B}. Tokens:')); ?>

			</div>
			<div class="d-flex flex-wrap gap-2">
				<button type="button" class="btn btn-sm btn-outline-secondary insert-token" data-token="{name}">{name}</button>
				<button type="button" class="btn btn-sm btn-outline-secondary insert-token" data-token="{random_text}">{random_text}</button>
				<button type="button" class="btn btn-sm btn-outline-secondary insert-token" data-token="{random_num}">{random_num}</button>
				<button type="button" class="btn btn-sm btn-outline-secondary insert-token" data-token="{number}">{number}</button>
				<button type="button" class="btn btn-sm btn-outline-info wrap-spintax" data-a="Hi" data-b="Hello"><?php echo e(__('Wrap {A|B}')); ?></button>
			</div>
			<div class="small">
				<div class="mb-1"><span class="text-nowrap"><?php echo e(__('Example')); ?></span>: <code><?php echo e(__('{Hi|Hello}')); ?> <?php echo e(__('Mr.')); ?> {name}, <?php echo e(__('your number is')); ?> {number}</code></div>
				<div class="mb-1"><span class="text-nowrap"><?php echo e(__('Samples')); ?></span>: <code><?php echo e(__('Tag')); ?>: {random_text}</code> • <code><?php echo e(__('ID')); ?>: {random_num}</code></div>
				<div class="text-body-tertiary"><?php echo e(__('{random_text} is 4 random letters, e.g.')); ?> kdmw <?php echo e(__('and {random_num} is 4 random digits, e.g.')); ?> 9392</div>
			</div>
		</div>
	</div>
	<label for="message" class="form-label"><?php echo e(__('Text Message')); ?></label>
	<textarea id="inputText" name="message" class="form-control" cols="30" rows="15" required></textarea>
	<label for="footer" class="form-label"><?php echo e(__('Footer message *optional')); ?></label>
	<input type="text" name="footer" class="form-control" id="footer">
	<input type="hidden" name="type" value="text" />
</div>
<div id="emoji-portal" class="d-none" style="position:fixed; z-index:2000;"></div>
<script id="rajs">
	const emojiBtn = document.getElementById('emoji-btn');
	const emojiPortal = document.getElementById('emoji-portal');
	let emojiPicker;

	function ensurePicker() {
		if (emojiPicker) return;
		emojiPicker = document.createElement('emoji-picker');
		emojiPicker.id = 'emoji-picker';
		emojiPortal.appendChild(emojiPicker);
	}

	function placePicker() {
		if (!emojiBtn || !emojiPortal) return;
		const rect = emojiBtn.getBoundingClientRect();
		const pickerEl = emojiPicker;
		const w = pickerEl.offsetWidth || 320;
		const h = pickerEl.offsetHeight || 350;
		let left = rect.right - w;
		let top = rect.top - h - 8;
		if (top < 8) top = rect.bottom + 8;
		if (left < 8) left = 8;
		emojiPortal.style.left = left + 'px';
		emojiPortal.style.top = top + 'px';
	}

	function openPicker() {
		ensurePicker();
		emojiPortal.classList.remove('d-none');
		emojiPortal.style.visibility = 'hidden';
		requestAnimationFrame(function () {
			placePicker();
			emojiPortal.style.visibility = 'visible';
		});
	}

	function closePicker() {
		emojiPortal.classList.add('d-none');
	}
	if (emojiBtn && emojiPortal) {
		emojiBtn.addEventListener('click', function (e) {
			e.preventDefault();
			if (emojiPortal.classList.contains('d-none')) openPicker();
			else closePicker();
		});
		document.addEventListener('click', function (e) {
			if (!emojiPortal.classList.contains('d-none')) {
				if (!emojiPortal.contains(e.target) && !emojiBtn.contains(e.target)) closePicker();
			}
		});
		window.addEventListener('scroll', function () {
			if (!emojiPortal.classList.contains('d-none')) placePicker();
		}, true);
		window.addEventListener('resize', function () {
			if (!emojiPortal.classList.contains('d-none')) placePicker();
		});
	}

	document.addEventListener('emoji-click', function (event) {
		if (!emojiPicker || emojiPortal.classList.contains('d-none')) return;
		var unicode = (event.detail && (event.detail.unicode || (event.detail.emoji && event.detail.emoji.unicode))) || '';
		if (!unicode) return;
		var ta = document.getElementById('inputText');
		ta.focus();
		var start = ta.selectionStart || ta.value.length;
		var end = ta.selectionEnd || ta.value.length;
		ta.value = ta.value.slice(0, start) + unicode + ta.value.slice(end);
		var pos = start + unicode.length;
		ta.setSelectionRange(pos, pos);
	});
	function insertAtCursor(field, text) {
		var start = field.selectionStart || 0
		var end = field.selectionEnd || 0
		var val = field.value
		field.value = val.substring(0, start) + text + val.substring(end)
		var pos = start + text.length
		field.setSelectionRange(pos, pos)
		field.focus()
	}
	document.querySelectorAll('.insert-token').forEach(function (el) {
		el.addEventListener('click', function (e) {
			e.preventDefault()
			var ta = document.getElementById('inputText')
			if (!ta) return
			insertAtCursor(ta, this.dataset.token)
		})
	})
	document.querySelectorAll('.wrap-spintax').forEach(function (el) {
		el.addEventListener('click', function (e) {
			e.preventDefault()
			var ta = document.getElementById('inputText')
			if (!ta) return
			var start = ta.selectionStart || 0
			var end = ta.selectionEnd || 0
			var selected = ta.value.substring(start, end)
			var a = selected && selected.trim().length ? selected : (this.dataset.a || 'Hi')
			var b = this.dataset.b || 'Hello'
			var text = '{' + a + '|' + b + '}'
			insertAtCursor(ta, text)
		})
	})
	
	document.getElementById('rajs').innerHTML = '';
	document.getElementById('rajs').remove();
	document.querySelectorAll('.d-flex button').forEach(function(button) {
			button.addEventListener('click', function(event) {
				event.preventDefault();
			});
		});
            var that = this;
            String.prototype.Capitalize = function(keep = false) {
                return this.replace(/\b\w+\b/g, function(match) {
                    return match.charAt(0).toUpperCase() + (keep ? match.slice(1) : match.slice(1).toLowerCase());
                });
            };
            const selectedSocialMedia = "whatsapp";
            const mediaName = (selectedSocialMedia)
                .replace('whatsapp', 'whatsApp')
                .replace('tiktok', 'tikTok')
                .replace('youtube', 'youTube')
                .Capitalize(true);

            // console.log("mediaName", mediaName), ;
            document.querySelectorAll('.currentPlatform').forEach(element => {
                element.innerText = mediaName;
            });

            document
                .querySelectorAll(`div[data-platform]:not([data-platform='${(selectedSocialMedia || '').toLowerCase()}'])`)
                .forEach(element => {
                    element.style.display = 'none';
                    element.classList.remove('list-group-item')
                });

            document.querySelectorAll(`div[data-platform='${(selectedSocialMedia || '').toLowerCase()}']`).forEach(
                element => {
                    element.style.display = 'block';
                    element.classList.add('list-group-item')

                });
            String.prototype.Capitalize = function(keep = false) {
                return this.replace(/\b\w+\b/g, function(match) {
                    return match.charAt(0).toUpperCase() + (keep ? match.slice(1) : match.slice(1).toLowerCase());
                });
            };
            document.querySelectorAll('.currentPlatform').forEach(element => {
                element.innerText = ((element.innerText || '').toLowerCase()).replace('tiktok', 'tikTok').replace(
                    'youtube', 'youTube').Capitalize(true);
            });

            window.selectTextByDefault = false;


            //  choose option
            document.querySelectorAll('[data-option]').forEach((el) => {
                el.addEventListener('click', function(event) {
					event.preventDefault();
                    var option = this.getAttribute('data-option');
                    console.log('OPtion: ', option);
                    textFormat(option);
                });
            });

            // default
            const textOptions = {
                bold: {
                    // ' ': ' ',
                    // ',': ',',
                    // ':': ':',
                    // '!': '!',
                    // '=': '=',
                    // '-': '-',
                    // '_': '_',
                    // '&': '&',
                    0: '𝟎',
                    1: '𝟏',
                    2: '𝟐',
                    3: '𝟑',
                    4: '𝟒',
                    5: '𝟓',
                    6: '𝟔',
                    7: '𝟕',
                    8: '𝟖',
                    9: '𝟗',
                    a: '𝐚',
                    b: '𝐛',
                    c: '𝐜',
                    d: '𝐝',
                    e: '𝐞',
                    f: '𝐟',
                    g: '𝐠',
                    h: '𝐡',
                    i: '𝐢',
                    j: '𝐣',
                    k: '𝐤',
                    l: '𝐥',
                    m: '𝐦',
                    ñ: '𝐧̃',
                    n: '𝐧',
                    o: '𝐨',
                    p: '𝐩',
                    q: '𝐪',
                    r: '𝐫',
                    s: '𝐬',
                    t: '𝐭',
                    u: '𝐮',
                    v: '𝐯',
                    w: '𝐰',
                    x: '𝐱',
                    y: '𝐲',
                    z: '𝐳',
                    A: '𝐀',
                    B: '𝐁',
                    C: '𝐂',
                    D: '𝐃',
                    E: '𝐄',
                    F: '𝐅',
                    G: '𝐆',
                    H: '𝐇',
                    I: '𝐈',
                    J: '𝐉',
                    K: '𝐊',
                    L: '𝐋',
                    M: '𝐌',
                    N: '𝐍',
                    O: '𝐎',
                    P: '𝐏',
                    Q: '𝐐',
                    R: '𝐑',
                    S: '𝐒',
                    T: '𝐓',
                    U: '𝐔',
                    V: '𝐕',
                    W: '𝐖',
                    X: '𝐗',
                    Y: '𝐘',
                    Z: '𝐙'
                },
                italic: {
                    a: '𝘢',
                    b: '𝘣',
                    c: '𝘤',
                    d: '𝘥',
                    e: '𝘦',
                    f: '𝘧',
                    g: '𝘨',
                    h: '𝘩',
                    i: '𝘪',
                    j: '𝘫',
                    k: '𝘬',
                    l: '𝘭',
                    m: '𝘮',
                    ñ: '𝑛̃',
                    n: '𝘯',
                    o: '𝘰',
                    p: '𝘱',
                    q: '𝘲',
                    r: '𝘳',
                    s: '𝘴',
                    t: '𝘵',
                    u: '𝘶',
                    v: '𝘷',
                    w: '𝘸',
                    x: '𝘹',
                    y: '𝘺',
                    z: '𝘻',
                    A: '𝘈',
                    B: '𝘉',
                    C: '𝘊',
                    D: '𝘋',
                    E: '𝘌',
                    F: '𝘍',
                    G: '𝘎',
                    H: '𝘏',
                    I: '𝘐',
                    J: '𝘑',
                    K: '𝘒',
                    L: '𝘓',
                    M: '𝘔',
                    N: '𝘕',
                    O: '𝘖',
                    P: '𝘗',
                    Q: '𝘘',
                    R: '𝘙',
                    S: '𝘚',
                    T: '𝘛',
                    U: '𝘜',
                    V: '𝘝',
                    W: '𝘞',
                    X: '𝘟',
                    Y: '𝘠',
                    Z: '𝘡'
                },
                underline: {
                    // '.':'̲.̲',
                    // '?': '̲?̲',
                    // ' ': ' ̲',
                    // ',': '̲,̲',
                    // ':': '̲:̲',
                    // '!': '̲!̲',
                    // '=': '̲=̲',
                    // '-': '̲-̲',
                    // '_': '̲_̲͟',
                    // '&': '̲&̲',
                    0: '𝟶̲',
                    1: '̲𝟷̲',
                    2: '̲𝟸̲',
                    3: '̲𝟹̲',
                    4: '̲𝟺̲',
                    5: '̲𝟻̲',
                    6: '̲𝟼̲',
                    7: '̲𝟽̲',
                    8: '̲𝟾̲',
                    9: '̲𝟿̲',
                    a: '̲𝚊̲',
                    b: '̲𝚋̲',
                    c: '̲𝚌̲',
                    d: '̲𝚍̲',
                    e: '̲𝚎̲',
                    f: '̲𝚏̲',
                    g: '̲𝚐̲',
                    h: '̲𝚑̲',
                    i: '̲𝚒̲',
                    j: '̲𝚓̲',
                    k: '̲𝚔̲',
                    l: '̲𝚕̲',
                    m: '̲𝚖̲',
                    ñ: '̲ñ̲',
                    n: '̲𝚗̲',
                    o: '̲𝚘̲',
                    p: '̲𝚙̲',
                    q: '̲𝚚̲',
                    r: '̲𝚛̲',
                    s: '̲𝚜̲',
                    t: '̲𝚝̲',
                    u: '̲𝚞̲',
                    v: '̲𝚟̲',
                    w: '̲𝚠̲',
                    x: '̲𝚡̲',
                    y: '̲𝚢̲',
                    z: '̲𝚣̲',
                    A: '̲𝙰̲',
                    B: '̲𝙱̲',
                    C: '̲𝙲̲',
                    D: '̲𝙳̲',
                    E: '̲𝙴̲',
                    F: '̲𝙵̲',
                    G: '̲𝙶̲',
                    H: '̲𝙷̲',
                    I: '̲𝙸̲',
                    J: '̲𝙹̲',
                    K: '̲𝙺̲',
                    L: '̲𝙻̲',
                    M: '̲𝙼̲',
                    N: '̲𝙽̲',
                    O: '̲𝙾̲',
                    P: '̲𝙿̲',
                    Q: '̲𝚀̲',
                    R: '̲𝚁̲',
                    S: '̲𝚂̲',
                    T: '̲𝚃̲',
                    U: '̲𝚄̲',
                    V: '̲𝚅̲',
                    W: '̲𝚆̲',
                    X: '̲𝚇̲',
                    Y: '̲𝚈̲',
                    Z: '̲𝚉̲'
                },
                strikeThrough: {
                    // '.': '/̵',
                    // '?': '̵?̵',
                    ' ': ' ̵',
                    ',': '̵,̵',
                    ':': '̵:̵',
                    '!': '̵!̵',
                    '=': '̵=̵',
                    '-': '̵-̵',
                    '_': '̵_̵',
                    '&': '&̵',
                    0: '0̶',
                    1: '1̶',
                    2: '2̶',
                    3: '3̶',
                    4: '4̶',
                    5: '5̶',
                    6: '6̶',
                    7: '7̶',
                    8: '8̶',
                    9: '9̶',
                    a: 'a̶',
                    b: 'b̶',
                    c: 'c̶',
                    d: 'd̶',
                    e: 'e̶',
                    f: 'f̶',
                    g: 'g̶',
                    h: 'h̶',
                    i: 'i̶',
                    j: 'j̶',
                    k: 'k̶',
                    l: 'l̶',
                    m: 'm̶',
                    ñ: 'ñ̶',
                    n: 'n̶',
                    o: 'o̶',
                    p: 'p̶',
                    q: 'q̶',
                    r: 'r̶',
                    s: 's̶',
                    t: 't̶',
                    u: 'u̶',
                    v: 'v̶',
                    w: 'w̶',
                    x: 'x̶',
                    y: 'y̶',
                    z: 'z̶',
                    A: 'A̶',
                    B: 'B̶',
                    C: 'C̶',
                    D: 'D̶',
                    E: 'E̶',
                    F: 'F̶',
                    G: 'G̶',
                    H: 'H̶',
                    I: 'I̶',
                    J: 'J̶',
                    K: 'K̶',
                    L: 'L̶',
                    M: 'M̶',
                    N: 'N̶',
                    O: 'O̶',
                    P: 'P̶',
                    Q: 'Q̶',
                    R: 'R̶',
                    S: 'S̶',
                    T: 'T̶',
                    U: 'U̶',
                    V: 'V̶',
                    W: 'W̶',
                    X: 'X̶',
                    Y: 'Y̶',
                    Z: 'Z̶'
                },
                cursive: {
                    0: '0',
                    1: '1',
                    2: '2',
                    3: '3',
                    4: '4',
                    5: '5',
                    6: '6',
                    7: '7',
                    8: '8',
                    9: '9',
                    a: '𝒶',
                    b: '𝒷',
                    c: '𝒸',
                    d: '𝒹',
                    e: '𝑒',
                    f: '𝒻',
                    g: '𝑔',
                    h: '𝒽',
                    i: '𝒾',
                    j: '𝒿',
                    k: '𝓀',
                    l: '𝓁',
                    m: '𝓂',
                    n: '𝓃',
                    ñ: '𝓃̃',
                    o: '𝑜',
                    p: '𝓅',
                    q: '𝓆',
                    r: '𝓇',
                    s: '𝓈',
                    t: '𝓉',
                    u: '𝓊',
                    v: '𝓋',
                    w: '𝓌',
                    x: '𝓍',
                    y: '𝓎',
                    z: '𝓏',
                    A: '𝒜',
                    B: 'ℬ',
                    C: '𝒞',
                    D: '𝒟',
                    E: 'ℰ',
                    F: 'ℱ',
                    G: '𝒢',
                    H: 'ℋ',
                    I: 'ℐ',
                    J: '𝒥',
                    K: '𝒦',
                    L: 'ℒ',
                    M: 'ℳ',
                    N: '𝒩',
                    O: '𝒪',
                    P: '𝒫',
                    Q: '𝒬',
                    R: 'ℛ',
                    S: '𝒮',
                    T: '𝒯',
                    U: '𝒰',
                    V: '𝒱',
                    W: '𝒲',
                    X: '𝒳',
                    Y: '𝒴',
                    Z: '𝒵'
                },
                doublestruck: {
                    0: '𝟘',
                    1: '𝟙',
                    2: '𝟚',
                    3: '𝟛',
                    4: '𝟜',
                    5: '𝟝',
                    6: '𝟞',
                    7: '𝟟',
                    8: '𝟠',
                    9: '𝟡',
                    a: '𝕒',
                    b: '𝕓',
                    c: '𝕔',
                    d: '𝕕',
                    e: '𝕖',
                    f: '𝕗',
                    g: '𝕘',
                    h: '𝕙',
                    i: '𝕚',
                    j: '𝕛',
                    k: '𝕜',
                    l: '𝕝',
                    m: '𝕞',
                    n: '𝕟',
                    ñ: '𝕟̃',
                    o: '𝕠',
                    p: '𝕡',
                    q: '𝕢',
                    r: '𝕣',
                    s: '𝕤',
                    t: '𝕥',
                    u: '𝕦',
                    v: '𝕧',
                    w: '𝕨',
                    x: '𝕩',
                    y: '𝕪',
                    z: '𝕫',
                    A: '𝔸',
                    B: '𝔹',
                    C: 'ℂ',
                    D: '𝔻',
                    E: '𝔼',
                    F: '𝔽',
                    G: '𝔾',
                    H: 'ℍ',
                    I: '𝕀',
                    J: '𝕁',
                    K: '𝕂',
                    L: '𝕃',
                    M: '𝕄',
                    N: 'ℕ',
                    Ñ: 'ℕ̃',
                    O: '𝕆',
                    P: 'ℙ',
                    Q: 'ℚ',
                    R: 'ℝ',
                    S: '𝕊',
                    T: '𝕋',
                    U: '𝕌',
                    V: '𝕍',
                    W: '𝕎',
                    X: '𝕏',
                    Y: '𝕐',
                    Z: 'ℤ'
                },
                circled: {
                    0: '⓪',
                    1: '①',
                    2: '②',
                    3: '③',
                    4: '④',
                    5: '⑤',
                    6: '⑥',
                    7: '⑦',
                    8: '⑧',
                    9: '⑨',
                    a: 'ⓐ',
                    b: 'ⓑ',
                    c: 'ⓒ',
                    d: 'ⓓ',
                    e: 'ⓔ',
                    f: 'ⓕ',
                    g: 'ⓖ',
                    h: 'ⓗ',
                    i: 'ⓘ',
                    j: 'ⓙ',
                    k: 'ⓚ',
                    l: 'ⓛ',
                    m: 'ⓜ',
                    ñ: 'ñ',
                    n: 'ⓝ',
                    o: 'ⓞ',
                    p: 'ⓟ',
                    q: 'ⓠ',
                    r: 'ⓡ',
                    s: 'ⓢ',
                    t: 'ⓣ',
                    u: 'ⓤ',
                    v: 'ⓥ',
                    w: 'ⓦ',
                    x: 'ⓧ',
                    y: 'ⓨ',
                    z: 'ⓩ',
                    A: 'Ⓐ',
                    B: 'Ⓑ',
                    C: 'Ⓒ',
                    D: 'Ⓓ',
                    E: 'Ⓔ',
                    F: 'Ⓕ',
                    G: 'Ⓖ',
                    H: 'Ⓗ',
                    I: 'Ⓘ',
                    J: 'Ⓙ',
                    K: 'Ⓚ',
                    L: 'Ⓛ',
                    M: 'Ⓜ',
                    N: 'Ⓝ',
                    O: 'Ⓞ',
                    P: 'Ⓟ',
                    Q: 'Ⓠ',
                    R: 'Ⓡ',
                    S: 'Ⓢ',
                    T: 'Ⓣ',
                    U: 'Ⓤ',
                    V: 'Ⓥ',
                    W: 'Ⓦ',
                    X: 'Ⓧ',
                    Y: 'Ⓨ',
                    Z: 'Ⓩ'
                },
                circledDark: {
                    0: '⓪',
                    1: '①',
                    2: '②',
                    3: '③',
                    4: '④',
                    5: '⑤',
                    6: '⑥',
                    7: '⑦',
                    8: '⑧',
                    9: '⑨',
                    a: '🅐',
                    b: '🅑',
                    c: '🅒',
                    d: '🅓',
                    e: '🅔',
                    f: '🅕',
                    g: '🅖',
                    h: '🅗',
                    i: '🅘',
                    j: '🅙',
                    k: '🅚',
                    l: '🅛',
                    m: '🅜',
                    ñ: 'ñ',
                    n: '🅝',
                    o: '🅞',
                    p: '🅟',
                    q: '🅠',
                    r: '🅡',
                    s: '🅢',
                    t: '🅣',
                    u: '🅤',
                    v: '🅥',
                    w: '🅦',
                    x: '🅧',
                    y: '🅨',
                    z: '🅩',
                    A: '🅐',
                    B: '🅑',
                    C: '🅒',
                    D: '🅓',
                    E: '🅔',
                    F: '🅕',
                    G: '🅖',
                    H: '🅗',
                    I: '🅘',
                    J: '🅙',
                    K: '🅚',
                    L: '🅛',
                    M: '🅜',
                    N: '🅝',
                    O: '🅞',
                    P: '🅟',
                    Q: '🅠',
                    R: '🅡',
                    S: '🅢',
                    T: '🅣',
                    U: '🅤',
                    V: '🅥',
                    W: '🅦',
                    X: '🅧',
                    Y: '🅨',
                    Z: '🅩'
                },
                gothic: {
                    0: '0',
                    1: '1',
                    2: '2',
                    3: '3',
                    4: '4',
                    5: '5',
                    6: '6',
                    7: '7',
                    8: '8',
                    9: '9',
                    a: '𝔞',
                    b: '𝔟',
                    c: '𝔠',
                    d: '𝔡',
                    e: '𝔢',
                    f: '𝔣',
                    g: '𝔤',
                    h: '𝔥',
                    i: '𝔦',
                    j: '𝔧',
                    k: '𝔨',
                    l: '𝔩',
                    m: '𝔪',
                    ñ: 'ñ',
                    n: '𝔫',
                    o: '𝔬',
                    p: '𝔭',
                    q: '𝔮',
                    r: '𝔯',
                    s: '𝔰',
                    t: '𝔱',
                    u: '𝔲',
                    v: '𝔳',
                    w: '𝔴',
                    x: '𝔵',
                    y: '𝔶',
                    z: '𝔷',
                    A: '𝔄',
                    B: '𝔅',
                    C: 'ℭ',
                    D: '𝔇',
                    E: '𝔈',
                    F: '𝔉',
                    G: '𝔊',
                    H: 'ℌ',
                    I: 'ℑ',
                    J: '𝔍',
                    K: '𝔎',
                    L: '𝔏',
                    M: '𝔐',
                    N: '𝔑',
                    O: '𝔒',
                    P: '𝔓',
                    Q: '𝔔',
                    R: 'ℜ',
                    S: '𝔖',
                    T: '𝔗',
                    U: '𝔘',
                    V: '𝔙',
                    W: '𝔚',
                    X: '𝔛',
                    Y: '𝔜',
                    Z: 'ℨ'
                },
                squared: {
                    0: '0',
                    1: '1',
                    2: '2',
                    3: '3',
                    4: '4',
                    5: '5',
                    6: '6',
                    7: '7',
                    8: '8',
                    9: '9',
                    a: '🄰',
                    b: '🄱',
                    c: '🄲',
                    d: '🄳',
                    e: '🄴',
                    f: '🄵',
                    g: '🄶',
                    h: '🄷',
                    i: '🄸',
                    j: '🄹',
                    k: '🄺',
                    l: '🄻',
                    m: '🄼',
                    ñ: 'ñ',
                    n: '🄽',
                    o: '🄾',
                    p: '🄿',
                    q: '🅀',
                    r: '🅁',
                    s: '🅂',
                    t: '🅃',
                    u: '🅄',
                    v: '🅅',
                    w: '🅆',
                    x: '🅇',
                    y: '🅈',
                    z: '🅉',
                    A: '🄰',
                    B: '🄱',
                    C: '🄲',
                    D: '🄳',
                    E: '🄴',
                    F: '🄵',
                    G: '🄶',
                    H: '🄷',
                    I: '🄸',
                    J: '🄹',
                    K: '🄺',
                    L: '🄻',
                    M: '🄼',
                    N: '🄽',
                    O: '🄾',
                    P: '🄿',
                    Q: '🅀',
                    R: '🅁',
                    S: '🅂',
                    T: '🅃',
                    U: '🅄',
                    V: '🅅',
                    W: '🅆',
                    X: '🅇',
                    Y: '🅈',
                    Z: '🅉'
                },
                squaredDark: {
                    0: '0',
                    1: '1',
                    2: '2',
                    3: '3',
                    4: '4',
                    5: '5',
                    6: '6',
                    7: '7',
                    8: '8',
                    9: '9',
                    a: '🅰',
                    b: '🅱',
                    c: '🅲',
                    d: '🅳',
                    e: '🅴',
                    f: '🅵',
                    g: '🅶',
                    h: '🅷',
                    i: '🅸',
                    j: '🅹',
                    k: '🅺',
                    l: '🅻',
                    m: '🅼',
                    ñ: 'ñ',
                    n: '🅽',
                    o: '🅾',
                    p: '🅿',
                    q: '🆀',
                    r: '🆁',
                    s: '🆂',
                    t: '🆃',
                    u: '🆄',
                    v: '🆅',
                    w: '🆆',
                    x: '🆇',
                    y: '🆈',
                    z: '🆉',
                    A: '🅰',
                    B: '🅱',
                    C: '🅲',
                    D: '🅳',
                    E: '🅴',
                    F: '🅵',
                    G: '🅶',
                    H: '🅷',
                    I: '🅸',
                    J: '🅹',
                    K: '🅺',
                    L: '🅻',
                    M: '🅼',
                    N: '🅽',
                    O: '🅾',
                    P: '🅿',
                    Q: '🆀',
                    R: '🆁',
                    S: '🆂',
                    T: '🆃',
                    U: '🆄',
                    V: '🆅',
                    W: '🆆',
                    X: '🆇',
                    Y: '🆈',
                    Z: '🆉'
                },
                doublestruckAlt: {
                    0: '𝟘',
                    1: '𝟙',
                    2: '𝟚',
                    3: '𝟛',
                    4: '𝟜',
                    5: '𝟝',
                    6: '𝟞',
                    7: '𝟟',
                    8: '𝟠',
                    9: '𝟡',
                    a: '⋒',
                    b: 'ᲇ',
                    c: '⋐',
                    d: 'ⅆ',
                    e: 'ⅇ',
                    f: '⨎',
                    g: '𓉛',
                    h: 'ꖲ',
                    i: 'ⅈ',
                    j: 'ⅉ',
                    k: 'Ԟ',
                    l: 'ǁ',
                    m: '⩕',
                    ñ: 'ñ',
                    n: 'ℼ',
                    o: '☉',
                    p: 'ꘝ',
                    q: '¶',
                    r: 'ℾ',
                    s: '𝕤',
                    t: '╬',
                    u: '⋓',
                    v: '⩔',
                    w: 'ꖿ',
                    x: '⨳',
                    y: 'ℽ',
                    z: 'ẕ',
                    A: '⩓',
                    B: '𝄡',
                    C: 'ꗲ',
                    D: 'ⅅ',
                    E: '⅀',
                    F: '╒',
                    G: '𓉙',
                    H: '⧦',
                    I: '⟦',
                    J: '╝',
                    K: 'Ҝ',
                    L: '╚',
                    M: '⨇',
                    N: 'ℿ',
                    O: '⌾',
                    P: '⁋',
                    Q: '𓉗',
                    R: '𖤧',
                    S: 'ꗟ',
                    T: '⍑',
                    U: 'ᕰ',
                    V: '⨈',
                    W: 'ꔞ',
                    X: '𖢗',
                    Y: '𖥬',
                    Z: 'ꙃ'
                },
                sansserif: {
                    ' ': ' ',
                    ',': ',',
                    ':': ':',
                    '!': '!',
                    '=': '=',
                    '-': '-',
                    '_': '_',
                    '&': '&',
                    0: '𝟢',
                    1: '𝟣',
                    2: '𝟤',
                    3: '𝟥',
                    4: '𝟦',
                    5: '𝟧',
                    6: '𝟨',
                    7: '𝟩',
                    8: '𝟪',
                    9: '𝟫',
                    a: '𝖺',
                    b: '𝖻',
                    c: '𝖼',
                    d: '𝖽',
                    e: '𝖾',
                    f: '𝖿',
                    g: '𝗀',
                    h: '𝗁',
                    i: '𝗂',
                    j: '𝗃',
                    k: '𝗄',
                    l: '𝗅',
                    m: '𝗆',
                    ñ: '𝗇̃',
                    n: '𝗇',
                    o: '𝗈',
                    p: '𝗉',
                    q: '𝗊',
                    r: '𝗋',
                    s: '𝗌',
                    t: '𝗍',
                    u: '𝗎',
                    v: '𝗏',
                    w: '𝗐',
                    x: '𝗑',
                    y: '𝗒',
                    z: '𝗓',
                    A: '𝖠',
                    B: '𝖡',
                    C: '𝖢',
                    D: '𝖣',
                    E: '𝖤',
                    F: '𝖥',
                    G: '𝖦',
                    H: '𝖧',
                    I: '𝖨',
                    J: '𝖩',
                    K: '𝖪',
                    L: '𝖫',
                    M: '𝖬',
                    N: '𝖭',
                    O: '𝖮',
                    P: '𝖯',
                    Q: '𝖰',
                    R: '𝖱',
                    S: '𝖲',
                    T: '𝖳',
                    U: '𝖴',
                    V: '𝖵',
                    W: '𝖶',
                    X: '𝖷',
                    Y: '𝖸',
                    Z: '𝖹',
                },

            };

            // text format
            function textFormat(charType = 'bold') {
                var text = document.querySelector('#inputText');
                var selectionStart = text.selectionStart;
                var selectionEnd = text.selectionEnd;
                var s = text.value.substring(selectionStart, selectionEnd);

                var isempty = false;
                if (window.selectTextByDefault) {
                    isempty = s ? false : true;
                    selectionStart = isempty ? 0 : selectionStart;
                    s = s ? s : text.value;
                }

                // reset all styles
                Object.entries(textOptions).forEach(function(obj) {
                    console.log(obj[0], obj[0] === charType, obj[1], textOptions[charType]);

                    if (obj[0] != charType) {
                        for (let letter in obj[1]) {
                            var b = new RegExp(obj[1][letter], 'g');
                            s = s.replace(b, letter);
                        }
                    }

                });

                var styleChars = textOptions[charType];

                for (let letter in styleChars) {
                    var c = new RegExp(letter, 'g');
                    var b = new RegExp(styleChars[letter], 'g');
                    var t = new RegExp(`ts-${letter}`, 'g');
                    var r = `ts-${letter}`;
                    s = s.replace(c, r);
                    s = s.replace(b, letter);
                    s = s.replace(t, styleChars[letter]);
                }

                text.value = isempty ? s : text.value.substring(0, selectionStart) + s + text.value.substring(selectionEnd);
                text.focus();
                text.setSelectionRange(selectionStart, selectionStart + s.length);
            }
</script>
<script type="module" src="<?php echo e(asset('js/emoji/picker.min.js')); ?>?v=<?php echo e(config('app.version')); ?>"></script><?php /**PATH /www/wwwroot/public_html/website/wa.bdi.asia/resources/themes/vuexy/views/ajax/blast/formtext.blade.php ENDPATH**/ ?>