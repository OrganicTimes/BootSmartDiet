<?php

require 'PHPMailer-master/PHPMailerAutoload.php';


header('Location: http://bootsmartdiet/emailsent.html');
if(!empty($_POST)) {
	$gender = $_POST['genderHid'];
	$age = $_POST['ageHid'];
	$blood = $_POST['bloodHid'];
	$taste = $_POST['tasteHid'];
	$email = $_POST['emailinput'];
}	
//первая инструкция пользователю
$startmessage = '<p>Рекомендуем прочесть статью до конца.<br>Время прочтения - 4 минуты</p>';
//echo $startmessage;


//собираем вводное предложение
$defineGender = '';
$defineAge = '';
$defineBlood = '';
$defineTaste = '';

if (strpos($gender, 'енщина')) {
	$defineGender = 'женщина';
} else {
	$defineGender = 'мужчина';
}

if (strpos($age, 'исполни')) {
	$defineAge = 'уже исполнилось 40 лет';
} else {
	$defineAge = 'еще нет 40';
}

if (strpos($blood, '(I)')) {
	$defineBlood = '0 (I) 1 группа крови - Охотник';
} elseif (strpos($blood, '(II)')){
	$defineBlood = '1 (II) 2 группа крови - Земледелец';
} elseif (strpos($blood, '(III)')){
	$defineBlood = '2 (III) 3 группа крови - Кочевник';
} elseif(strpos($blood, '(IV)')){
	$defineBlood = '3 (IV) 4 группа крови - Смешанный (Земледелец + Кочевник)';
}


if (strpos($age, 'исло')) {
	$defineTaste = 'съели бы что-то кисленькое.';
} else {
	$defineTaste = 'не отказались бы от чего-то горького.';
}
$summary = "<p>Итак, Вы - $defineGender и Вам $defineAge, у Вас $defineBlood, и Вы $defineTaste</p>";
//echo $summary;

//общая инфа
$common = "<h3>Сначала Общие рекомендации для всех, кто хочет похудеть</h3>
<ul>
<li>Не переедайте. Никогда.</li>
<li>Всегда завтракайте сытно.</li>
<li>Употребляйте 60% калорий в первой половине дня и 40% во второй.</li>
<li>Не употребляйте «быстрых» углеводов.</li>
<li>Ешьте больше овощей и, особенно, фруктов, богатых клетчаткой.</li>
<li>Пейте воду.</li>
<li>Ешьте сырую, печеную или отварную пищу, а не жареную.</li>
</ul>";
//echo $common;

//для женщин
if (strpos($gender, 'енщина')) {
	$textGender = "<h3>Особенности похудения для женщин</h3>
            <p>Женский организм настроен на то, чтобы все делать плавно. Женщины худеют дольше мужчин на одинаковое количество килограмм. При интенсивном похудении велик риск навредить состоянию кожи, ногтей, волос. Поэтому для женщин важно следить за достаточным уровнем микроэлементов в организме. </p>
            <p>Исключить из рациона:</p>
            <ul>
                <li>Высококалорийные молочные продукты</li>
                <li>Жирное мясо и жирная рыба. Употребляйте курицу, индейку и нежирные виды рыбы: минтай, треска, хек, навага, камбала.</li>
                <li>Алкоголь, в нем слишком много сахара. Кроме сухого вина. Но и с ним тоже не злоупотребляйте.</li>
                <li>Кондитерские изделия. В них также слишком много сахара. Замените сладости горьким шоколадом.</li>
                <li>Сладкие газированные напитки. Просто горы сахара.</li>
                <li>Картофель. Да, у нее высокий гликемический индекс. Если не можете без картофеля, то отварите его и ешьте с капустой или иными овощами с отрицательной калорийностью.</li>
                <li>Будьте осторожны с бобовыми. Они очень калорийны.</li>
            </ul>
            <p>Что можно есть (и нужно):</p>
            <ul>
                <li>Нежирные молочные продукты (творог, кефир, ряженка, нежирные сыры типа Моцареллы). В них есть кальций, а он нам нужен. Также молочные продукты ускоряют метаболизм.</li>
                <li>Крупы. Особенно геркулес и греча. Это не только источник легкоусваиваемой энергии, но и источник необходимых микроэлементов. Вообще в любой непонятной ситуации ешьте овсянку на завтрак.</li>
                <li>Орехи. Очень полезны. Источник растительных жиров, которыми можно при похудении заменить животные холестериновые жиры. Но, не переусердствуйте; орехи калорийны. Кроме того, не всякий холестерин вреден.</li>
                <li>Определенные овощи: огурцы, капуста, свекла, кабачки, помидоры (как видите мы перечисляем низкокалорийные оф=вощи). А также все съедобные травы: петрушка, укроп, кинза и так далее. Они ускоряют метаболизм и выводят токсины.</li>
                <li>Некоторые фрукты: грейпфрут, лимон, ананас, арбуз. Старайтесь не употреблять виноград – в нем много глюкозы. Да, это природная (хорошая глюкоза), но в деле похудения она нам не помощник. </li>
                <li>А что насчет яиц??? Отвечаем: утром 1 желток и сколько угодно белка. Во второй половине дня – исключить.</li>
            </ul>";
} else {
	$textGender = "<h3>Особенности похудения для мужчин</h3>
            <p>Мужской метаболизм быстрее женского. Кроме того, на все процессы очень влияет уровень тестостерона, который в принципе является залогом мужского здоровья. Поэтому при похудении важно предпринимать шаги, чтобы уровень тестостерона не падал. </p>
            <p>Исключить из рациона:</p>
            <ul>
                <li>Все виды ненатурального мяса, мясные полуфабрикаты: колбасы, сосиски. А также копчености.</li>
                <li>Сладкое и мучное.</li>
                <li>Фаст-фуд и прочие трансжиры.</li>
                <li>Алкоголь, особенно пиво.</li>
                <li>Сладкие газированные напитки.</li>
            </ul>
            <p>Что можно и нужно есть:</p>
            <ul>
                <li>Мясо нежирных сортов – телятина, курица, индейка, крольчатина,</li>
                <li>Жирные сорта рыбы – сельдь, форель, скумбрия, семга,</li>
                <li>Кисломолочные продукты – творог, кефир, натуральный йогурт, ряженка, сметана, нежирные сливки,</li>
                <li>Морепродукты – креветки, крабы, осьминоги, а также раки,</li>
                <li>Растительная пища – любые овощи и фрукты,</li>
                <li>Орехи, грибы.</li>
            </ul>
            <p>При похудении мужчинам важно следить за уровнем аминокислот Омега-3 и Омега-6 в организме. Из пищи их не получить в достаточном количестве, поэтому нужно приобрести соответствующие биокомплексы, или хотя бы рыбий жир.</p>";
}
//echo $textGender;

//выводим текст по возрасту
if (strpos($age, 'исполни')) {
	$textAge = "<p>Возраст в 40 лет считается в диетологии рубежным относительно того, сколько калорий организм тратит на жизнедеятельность (сжигает), а сколько запасает в виде жира. Разумеется, для каждого человека этот возраст индивидуален – для кого-то 38, а для кого-то 43. Но в среднем это именно около 40 лет.</p>
            <p>Если Вам больше 40, Ваш организм постепенно переходит в режим энергосбережения. Он расходует энергию очень экономно, и склонен ее запасать. Поэтому, каждая лишняя калория оседает на Ваших боках. А значит, Вам стоит сделать следующее:</p>
            <ul>
                <li>уменьшить порции, старайтесь вставать из-за стола как бы не до конца насытившись,</li>
                <li>то, сколько Вы едите влияет на Ваш вес больше чем уровень физической активности. То есть каждая лишняя калория будет стоить дороже в плане работы в зале,</li>
                <li>Вы больше не можете позволить себе просто есть полезную еду. Очень важно сколько Вы едите. Например, рыба полезна – это источник Омега-3 и фрукты полезны – это источник глюкозы. Но будьте осторожны и с тем и с другим. Жирная рыба слишком калорийна, а виноград содержит слишком много глюкозы, лучше съешьте арбуз.</li>
                <li>не избегайте белков. Просто не злоупотребляйте мясом. Дело в том, что белки участвуют в переработке жиров и вообще в выработке энергии. Если отказаться от них, то в итоге Вы начнете компенсировать недостаток энергии чем-то другим. Например, жирами или углеводами. А это намного хуже.</li>
                <li>не забывайте о ритмичных аэробных нагрузках,</li>
                <li>больше ходите с небольшим ускорением,</li>
                <li>не садитесь не жесткие диеты. Это не стратегия,</li>
                <li>избегайте всего искусственного в еде: заменитель сахара, трансжиры, полуфабрикаты. Наши организмы просто не умеют это толком переваривать,</li>
                <li>контролируйте время приема пищи, интервалы (они должны быть приблизительно равными), и особенно, время и количество потребляемых углеводов (только в первой половине дня).</li>
            </ul>
            <p>В целом старайтесь не воспринимать умеренную диету после 40, как жертву или наказание. Иначе Вы не выдержите этого при игре в долгую. Невозможно постоянно бороться. Лучшее средство – заменить удовольствие от еды другими видами удовольствия. Это может быть что угодно, что отвлекает Вас от мысли о наслаждении от еды.</p>";
} else {
	$textAge = "<p>Возраст в 40 лет считается в диетологии рубежным относительно того, сколько калорий организм тратит на жизнедеятельность (сжигает), а сколько запасает в виде жира. Разумеется, для каждого человека этот возраст индивидуален – для кого-то 38, а для кого-то 43. Но в среднем это именно около 40 лет.</p>
            <p>Итак, Вам меньше 40. Что же, Вам пока везет. Ваш организм пока настроен сжигать то, что Вы съели. Так как считает, что он (организм) молод и нужно не запасать энергию на плохие времена, а тратить на великие дела. Похудение для Вас - это просто чуть больше нагрузок, активности, движения, стрессов (да, стресс сжигает калории). Вы можете иногда позволить себе лишнего в еде, а потом отработать на беговой дорожке или пожить впроголодь 2 дня.</p>
            <p>Старайтесь все же не злоупотреблять фаст-фудом и «быстрыми» углеводами.</p>
            <p>В целом Вам достаточно соблюдать Общие рекомендации, которые Вы уже прочли выше.</p>
            <p>Если Вы хотите продлить это прекрасное время, займитесь спортом не «на износ». </p>";
}
//echo $textAge;

//текст для группы крови
if (strpos($blood, '(I)')) {
	$textBlood = '<p>Как у обладателя 1-ой группы крови у Вас сильный иммунитет и эффективный метаболизм.</p>
            <p>Что Вам полезно:</p>
            <ul>
                <li>Говяжий фарш, мясо индейки, телятину, баранину, говядину, печень и сердце,</li>
                <li>Осетрина, палтус, щука, водоросли, форель, хек, представители лососевых, скумбрия, треска,</li>
                <li>Капуста (кольраби и брокколи), салат-кресс, репа, перец острый, пастернак, свекла (листовая), цикорий, шпинат, тыква, репа, батат, земляной картофель,</li>
                <li>Чай с шиповником, липой, одуванчиками, петрушкой,</li>
                <li>Семена тыквы, орехи грецкие,</li>
                <li>Яблоки, черешня, слива, алыча, инжир, чернослив,</li>
                <li>Соевое молоко, соевый сыр, фасоль пятнистая.</li>
            </ul>
            <p>Крайне нежелательно употреблять:</p>
            <ul>
                <li>Сало, свинина, мясо гуся, бекон и ветчина, окорока,</li>
                <li>Сельдь (под маринадом и соленая), рыба красная, прошедшая копчение, мясо сома, икра,</li>
                <li>Сыры (плавленые и изготовленные из коровьего молока), сыворотка, сметана, сливки, кефир, мороженое, молоко козы,</li>
                <li>Мак, фисташки, арахис,</li>
                <li>Бобы (чечевица),</li>
                <li>Ваниль, кетчуп, орех мускатный, перец черный, уксус (яблочный, белый, винный), соленья, маринад, корица,</li>
                <li>Капуста (белокочанная, пекинская, цветная, брюссельская, листовая), картофель, шампиньоны, ревень,</li>
                <li>Авокадо, ежевика, апельсины, кокосы, маслины, клубника, мандарины, дыня,</li>
                <li>Водка, настойка, коньяк, кофе, кола, лимонад, чай черный.</li>
            </ul>
            <p>Остальные продукты являются в целом нейтральными при условии соблюдения Общих рекомендаций.</p>';
} elseif (strpos($blood, '(II)')){
	$textBlood = '<p>Как представитель 2-ой группы крови Вы в целом постоянны, быстро адаптируетесь в новом коллективе, Вы собраны.</p>
            <p>Что Вам полезно:</p>
            <ul>
                <li>Карп, свежую сельдь, скумбрию, макрель, треску, форель, судака, рыбу из семейства лососевых,</li>
                <li>Оливковое и льняное масло,</li>
                <li>Бобы (черные и соевые), сыр (соевый), молоко (соевое), фасоль (пятнистая), бобы (соевые и черные), чечевица,</li>
                <li>Гречка и изделия из гречневой муки, рожь и ржаные хлебцы, изделия из ржаной муки овсянка, вафли рисовые,</li>
                <li>Листовая капуста, брокколи, кольраби, вешенки, перьевой лук, лук-порей, кресс-салат, тыква, топинамбур, шпинат, цикорий, свекла листовая, пастернак, репа, морковь, лук репчатый,</li>
                <li>Алыча, ананасы, брусника, вишня, голубика, грейпфрут, инжир, клюква, лимон, слива, черешня, черника, яблоко,</li>
                <li>Кофе, вино красное, чай зеленый.</li>
            </ul>
            <p>Крайне нежелательно употреблять:</p>
            <ul>
                <li>Телятину, баранину, говядину, крольчатину, свинину, мясо утки, сало, окорок, бекон и ветчина,</li>
                <li>Кальмары, камбала, красная рыба, прошедшая копчение, сельдь соленая и маринованная, сом, палтус, зубатка, икра,</li>
                <li>Кокосовое, хлопковое, кукурузное, арахисовое, сливочное масло,</li>
                <li>Молоко, мороженое, сыр из коровьего молока, сыворотка,</li>
                <li>Кетчуп, майонез, уксус (яблочный, винный, белый), перец черный,</li>
                <li>Манная крупа, макароны, крекеры, мюсли, выпечка, в том числе баранки и бублики, хлеб (зерновой и из муки грубого помола), пшеничные хлопья и пшеница, все изделия из муки твердых сортов,</li>
                <li>Капуста китайская, краснокочанная, белокочанная, цветная, шампиньоны, перец (сладкий и острый), помидоры, ревень,</li>
                <li>Бананы, апельсины, барбарис, маслины, кокосы, мандарины, дыни,</li>
                <li>Чай черный, пиво, кола, лимонад, настойки, водку, коньяк.</li>
            </ul>
            <p>Остальные продукты являются в целом нейтральными при условии соблюдения Общих рекомендаций.</p>';
} elseif (strpos($blood, '(III)')){
	$textBlood = '<p>У Вас 3 группа крови. Вы отличаетесь хорошим иммунитетом и способны употреблять в пищу практически любые продукты. Ваша нервная система весьма устойчива.</p>
            <p>Что Вам полезно:</p>
            <ul>
                <li>Яйца, крольчатина, баранина,</li>
                <li>Скумбрия и маринованная селедка, хек, треска, щука, судак, макрель, рыбы из семейства лососевых, палтус, осетр, камбала, форель, морской окунь,</li>
                <li>Масло оливковое,</li>
                <li>Сметана, творог и творожный сыр, йогурт, кефир, козье молоко, сыр из овечьего молока,</li>
                <li>Хрен, карри, петрушка,</li>
                <li>Овсяные хлопья, овсяная мука и овсяное печенье, рис и рисовые вафли, просо, пшеничный хлеб,</li>
                <li>Брокколи, брюссельская, цветная, листовая, краснокочанная и белокочанная капуста, листовая свекла, кресс-салат, перец (и сладкий, и острый), морковь, батат,</li>
                <li>Малиновый чай, чай с солодкой, петрушкой, шиповником, женьшенем,</li>
                <li>Зеленый чай,</li>
                <li>Кокос, ананас, яблоко, виноград, алыча, клюква, слива, брусника, банан, виноград.</li>
            </ul>
            <p>Крайне нежелательно употреблять:</p>
            <ul>
                <li>Куриное мясо, свинина, утка, гусь, окорок, ветчина, бекон,</li>
                <li>Морская капуста, икра, копченый лосось, все ракообразные, угорь,</li>
                <li>Мороженое,</li>
                <li>Тыквенные семечки, арахис, кедровые орешки, семена подсолнечника, фундук, фисташки,</li>
                <li>Майонез, корица, кетчуп,</li>
                <li>Кукуруза (зерно, хлопья и мука), мюсли, пшеница, рожь, все изделия из пшеничной и ржаной муки, гречка, перловка, ячневая крупа и все мучные изделия на основе этих круп,</li>
                <li>Чечевица, фасоль пятнистая, фасоль черная,</li>
                <li>Тыква, картофель, редька, помидоры, редиска, ревень,</li>
                <li>Кола, лимонад, водка, настойки, коньяк,</li>
                <li>Маслины, хурма, барбарис, авокадо, гранат.</li>
            </ul>
            <p>Остальные продукты являются в целом нейтральными при условии соблюдения Общих рекомендаций.</p>';
} elseif(strpos($blood, '(IV)')){
	$textBlood = '<p>У Вас 4 группа крови. У Вас не самый сильный иммунитет и избирательная пищеварительная система.</p>
            <p>Что Вам полезно:</p>
            <ul>
                <li>Крольчатина, баранина, индейка,</li>
                <li>Щука, треска, судка, рыбы семейства лососевых, форель, икра, окунь морской, осетр, скумбрия, макрель,</li>
                <li>Сыр овечий, сыр творожный, сметана, творог, йогурт, козье молоко, кефир,</li>
                <li>Грецкие орехи, арахис, мак,</li>
                <li>Рис, рисовые вафли, ржаной хлеб, ржаная мука, ржаные хлебцы, овсяные хлопья, овсяная мука, просо,</li>
                <li>Петрушка, хрен, карри,</li>
                <li>Грейпфрут, лимон, киви, крыжовник, виноград, вишня, инжир, алыча, яблоко, кокос, сливы, черешня, брусника,</li>
                <li>Огурец, пастернак, свекла листьями, батат, брокколи, капуста (листовая и цветная), острый и сладкий перец, кресс-салат,</li>
                <li>Кофе и зеленый чай,</li>
                <li>Ромашковый чай, земляничный чай, чай с солодкой, шиповником, женьшенем, боярышником и лопухом.</li>
            </ul>
            <p>Крайне нежелательно употреблять:</p>
            <ul>
                <li>Печень, яйцо, сало,</li>
                <li>Речной окунь, свежая селедка, карп, сом, корюшка, зубатка, водоросли,</li>
                <li>Сыворотка, сыр на основе молока коровьего, молоко без жира,</li>
                <li>Миндаль, кедровые орешки, фисташки,</li>
                <li>Овсяное печенье, крекер, ржаные пряники, хлеб (пшеничный, из муки грубого помола), хлопья пшеничные, сдоба, бублики, ячневая крупа, манка, макароны, мюсли, мука из твердых сортов пшеницы,</li>
                <li>Фасоль (спаржевая, белая), сыр и молоко (соевые), горошек (стручковый и зеленый),</li>
                <li>Лавровый лист, фенхель, паприка, укроп, тмин, гвоздика, горчица, корица, кориандр, мед, майонез, сахар, джем и желе фруктовое,</li>
                <li>Маслины, мандарины, малина, смородина, персики, нектарины, голубика, черника, арбуз, клубника, чернослив, изюм, голубика, ежевика, дыня,</li>
                <li>Лук (перьевой, порей, репчатый), репа, морковь, спаржа, свекла, салат кочанный, помидоры, тыква, земляной картофель, шампиньоны, цикорий, шпинат, кабачки, вешенки, брюква, капуста белокочанная, китайская, брюссельская, кольраби, картофель,</li>
                <li>Белое и красное вино, пиво.</li>
            </ul>
            <p>Остальные продукты являются в целом нейтральными при условии соблюдения Общих рекомендаций.</p>';
}
//echo $textBlood;

//текст про вкус
if (strpos($age, 'исло')) {
	$textTaste = '<p>Если Вам хочется кисленького это, скорее всего, значит следующее:</p>
            <ul>
                <li>Вы потребляете слишком много трудноусваиваемой пищи. Организму нужно повысить кислотность желудочного сока, чтобы быстрее переваривать ее. Это плохо. Может привести к язве или гастриту. Повышать кислотность желудочного сока небезопасно. Перейдите на более простую пищу.</li>
                <li>у Вас не хватает витамина С. Потребляйте больше цитрусовых. Самое лучшее – лимон.</li>
                <li>авитаминоз. Сопровождается ломотой в суставах, головными болями и так далее. Тут все очевидно – ешьте больше фруктов и овощей.</li>
            </ul>';
} else {
	$textTaste = '<p>Горечь – естественный детоксикант.</p>
            <p>Горькие овощи хорошо «умеют» выводить из организма токсины, плохой холестерин, и другие вредные вещества, которые мы накопили. Такие продукты, как грейпфрут, руккола, артишок, баклажан, брюссельская капуста, имбирь, кофе, чай, горький шоколад помогут избавиться от всего вредного. Поэтому, если хочется горького – ешьте горькое. Организм сигнализирует Вам что ему нужен детокс. В настоящий момент пищевая индустрия научилась удалять из продуктов естественную горечь, чтобы повысить наше удовольствие от продуктов и, соответственно, свои продажи. Поэтому горечь нужно покупать и употреблять самим целенаправленно. </p>';
}
//echo $textTaste;


//пожелание
$goodluck = "<p>Удачи Вам!</p>";
//echo $goodluck;

//ссылка в конце
$reference = "<p>А это проверенное инновационное средство поможет Вам на пути к красоте.<br>Переходим и худеем ... https://tinyurl.com/contur-slim<p>";
//echo $reference;

$fullmassege = 
"<div style='background-image:url(werty363544.jpg);'>
<div style='font-style:Roboto; font-size:14px;padding:20px 30px; color:white; background-image: -moz-linear-gradient(top, rgba(0,0,0,0.60), rgba(0,0,0,0.50));background-image: -webkit-linear-gradient(top, rgba(0,0,0,0.60), rgba(0,0,0,0.50));background-image: -o-linear-gradient(top, rgba(0,0,0,0.60), rgba(0,0,0,0.50));background-image: -ms-linear-gradient(top, rgba(0,0,0,0.60), rgba(0,0,0,0.50));background-image: linear-gradient(top, rgba(0,0,0,0.70), rgba(0,0,0,0.60));filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#4c000000', endColorstr='#66000000');padding-top:135px;padding-bottom:150px;'> $startmessage $summary $common $textGender $textAge $textBlood $textTaste $goodluck</div>
</div>"; 
//echo $fullmassege;




	$mail = new PHPMailer;
	$mail -> isSMTP();
	$mail -> Host = 'smtp.gmail.com';
	$mail -> SMTPAuth = true;
	$mail -> Username = 'smartdiet.2019';
	$mail -> Password = 'smart2019+-oct';
	$mail -> SMTPSecure = 'tls';
	$mail -> Port = '587';
	$mail -> CharSet = 'UTF-8';

	$mail->SMTPKeepAlive = true;   
	//$mail->Mailer = “smtp”; // don't change the quotes!

	$mail -> From = 'smartdiet.2019@gmail.com';
	$mail -> FromName = 'Елена SmartDiet';
	// $mail -> addAddress('gamburk@yandex.ru');
	$mail -> addAddress('aarondelporto@gmail.com');
	$mail -> isHTML(true);
	$mail -> Subject = 'Персональные рекомендации по похудению для Вас!';
	$mail -> Body = $fullmassege;
	$mail -> AltBody = 'А это проверенное инновационное средство поможет Вам на пути к красоте.<br>Переходим и худеем ... https://tinyurl.com/contur-slim';

if($mail->send()){
	echo 'Письмо отправлено';
} else {
	echo 'Нифига';
	echo 'Ошибка ' . $mail->ErrorInfo;
}




//создаем файл и запихиваем туда email

file_put_contents('data.txt', $email.PHP_EOL, FILE_APPEND);

?>