<x-layout>
    <div class="flex flex-col items-center justify-center h-auto gap-8 my-52 text-[#123240]">
        <div class="w-full max-w-4xl">
            <h3 class=" px-4 py-2 text-3xl border-b-4 border-MarronSecundario">Estándar</h3>
            <div class=" px-4 mt-2">
                <x-faq-item question="ESTÁNDAR MORFOLÓGICO"
                    answer="  <embed src='{{ asset('storage\ESTANDAR_MORFOLOGICO_POINTER_FCI.pdf') }}' type='application/pdf' width='100%' height='600px'> " />
                <x-faq-item question="ESTÁNDAR DE TRABAJO"
                    answer=" <embed src='{{ asset('storage\ESTANDAR_TRABAJO_POINTER_RSCE.pdf') }}' type='application/pdf' width='100%' height='600px'>" />
            </div>
        </div>

        <div class="w-full bg-[#E8E6D9]">
            <div class="max-w-4xl mx-auto py-4">
                <div class="w-full max-w-4xl ">
                    <h3 class=" px-4 py-2 text-3xl border-b-4 border-MarronSecundario">Reglamentos</h3>
                    <div class=" px-4 mt-2">
                        <x-faq-item question="REGLAMENTOS DE TRABAJO. "
                            answer="<embed src='{{ asset('storage\reglamento-retrivers.pdf') }}' type='application/pdf' width='100%' height='600px'>" />
                        <x-faq-item question="REGLAMENTO DE LA COPA DE ESPAÑA CAZA PRÁCTICA"
                            answer="<embed src='{{ asset('storage\REGLAMENTO_COPA_ESPANA_CAZA_PRACTICA_INTERCLUBES.pdf') }}' type='application/pdf' width='100%' height='600px'>" />
                        <x-faq-item question="REGLAMENTO DE JUECES DE PRUEBAS Y EXPOSICIONES"
                            answer="<embed src='{{ asset('storage\REGLAMENTO_JUECES_MAYO_2024.pdf') }}' type='application/pdf' width='100%' height='600px'>" />
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-4xl">
            <h3 class=" px-4 py-2 text-3xl border-b-4 border-MarronSecundario">Enfermedades</h3>
            <div class=" px-4 mt-2">
                <x-faq-item question="BABESIOSIS"
                    answer='
                    
                    <div class="text-justify leading-relaxed">

    <p>
        <strong>La babesiosis</strong> es una enfermedad que se transmite a través de un organismo vector, 
        generalmente la <strong>garrapata (Ixodes dammini)</strong>; de hecho, este ácaro es el mismo que transmite 
        la <strong>enfermedad de Lyme</strong> y, a menudo, ambas van asociadas. Las garrapatas son unas inquilinas 
        realmente indeseables para nuestro perro. Su presencia en el can debe prevenirse desde el primer momento, 
        ya que transmiten dolencias de carácter grave a través de los microorganismos que portan en su saliva, 
        llevando a la sangre de nuestra mascota un peligro que, cuando la infestación es abundante, resulta letal. 
        En este sentido, la babesiosis es una de las enfermedades más características atribuida a estos conocidos arácnidos.
    </p>
    <br>

    <p>
        Está producida por un protozoo trasmitido por las garrapatas del género <strong>Ixodes</strong>. Igualmente, 
        se han dado casos de infección a través de la <strong>transfusión de sangre</strong> y 
        <strong>placentaria</strong>, esto es, de las perras a sus camadas. El parásito recibe el nombre de 
        <strong>Babesia canis</strong> si bien, hasta hace poco, también se consideraba a la 
        <strong>Babesia gibsoni</strong> un pariente próximo, pero en la actualidad se ha cambiado el nombre por el de 
        <strong>Theileria annae</strong> gracias a varios estudios de ADN. Esto explica que los animales infectados por 
        este parásito no respondieron al tratamiento habitual y tuvieran un pronóstico desfavorable. 
        La forma de transmisión más común, a través de la saliva, tiene lugar mientras la garrapata se alimenta de la 
        sangre del animal.
    </p>
    <br>

    <p>
        Sin embargo, este parásito necesita alimentarse como mínimo <strong>dos días</strong> antes de que se produzca 
        la auténtica transmisión. Una vez localizado en el interior de los glóbulos rojos, se multiplica y origina un 
        cuadro con los siguientes síntomas:
    </p>
    <ul class="list-disc ml-6">
        <li>Anemia</li>
        <li>Ictericia (las mucosas presentan una coloración amarilla)</li>
        <li>Fiebre</li>
        <li>Debilidad</li>
        <li>Depresión</li>
        <li>Disminución del número de plaquetas</li>
    </ul>
    <br>

    <p>
        El diagnóstico se centra en la observación del parásito en un <strong>frotis sanguíneo</strong> (extensión de una 
        muestra de sangre bajo el microscopio). Sin embargo, es recomendable realizar una analítica completa para valorar 
        el grado de anemia, ya que en casos graves puede ser precisa una transfusión sanguínea.
    </p>
    <br>

    <p>
        Algunas veces, la infección con parásitos de la <strong>Babesia</strong> puede ser asintomática o causar una 
        enfermedad leve no específica. En los casos más leves, esta enfermedad puede provocar <strong>febrícula</strong> 
        y algo de anemia. En los casos agudos, la temperatura corporal puede alcanzar los <strong>40 grados</strong> y 
        provocar fallos orgánicos, como:
    </p>
    <ul class="list-disc ml-6">
        <li>Insuficiencia respiratoria</li>
        <li>Cefaleas</li>
        <li>Náuseas y vómitos</li>
        <li>Mialgias</li>
        <li>Hemólisis</li>
    </ul>
    <br>

    <p>
        Puede producir lesiones en el corazón, pulmón, hígado, bazo, riñón y aparato digestivo, tales como:
    </p>
    <ul class="list-disc ml-6">
        <li>Infartos a nivel de las válvulas</li>
        <li>Hemorragias y edema alveolar</li>
        <li>Hepatomegalia</li>
        <li>Degeneración de la grasa</li>
        <li>Friabilidad y coloración parduzca en el bazo</li>
        <li>Glomerulonefritis</li>
        <li>Tubulonefritis</li>
        <li>Gastritis ulcerativa y hemorragias</li>
        <li>Enteritis descamativas a hemorrágicas</li>
    </ul>
    <br>

    <p>
        Los factores predisponentes dependen de su hospedador, del parásito y el medio de hospedador:
    </p>
    <ul class="list-disc ml-6">
        <li><strong>Edad</strong>: Contra más viejo sea, mayor predisposición.</li>
        <li><strong>Alimentación</strong>: Una buena alimentación contribuye a un menor porcentaje de ser infectado.</li>
        <li>Otros factores como la raza y la resistencia específica.</li>
    </ul>
    <br>

    <p>
        En el tratamiento veterinario de la babesiosis normalmente no se emplean antibióticos. En los animales, los 
        fármacos de elección para el tratamiento de <strong>Babesia canis rossi</strong> (perros en África), 
        <strong>Babesia bovis</strong> y <strong>Babesia bigemina</strong> (ganado vacuno en el sur de África) son:
    </p>
    <ul class="list-disc ml-6">
        <li>Diminazeno (Berenil, Benzamin B 12)</li>
        <li>Imidocarb (Imidofin)</li>
        <li>Azul de tripano</li>
    </ul>
    <br>

    <h3 class="text-lg font-bold">Prevención</h3>
    <p><strong>Collares o pipetas repelentes de las garrapatas.</strong></p>
</div>

                    
                    '/>
                <x-faq-item question="LEPTOSPIROSIS"
                    answer='
                    
                    <div class="text-justify leading-relaxed">
    <p>
        <strong>La Leptospirosis Canina</strong> es una enfermedad infecciosa y contagiosa bastante frecuente en los perros que viven en la ciudad o en el campo. Es causada por una bacteria llamada <strong>Leptospira Canícola</strong>. Afecta a muchos animales y es una <strong>zoonosis</strong>; o sea que se puede transmitir de los animales al hombre. Existen varios serotipos de <strong>Leptospira</strong> patógenos para el perro capaces de producir <strong>Leptospirosis Canina</strong>. Las puertas de entrada de estas bacterias son las mucosas conjuntivales y de la boca, así como la piel. Allí producen una irritación local y una rápida multiplicación pasando luego a la sangre y por medio de ésta a los diferentes órganos que afecta principalmente <strong>hígado</strong> y <strong>riñón</strong>.
    </p>

    <br>

    <p>
        Hay <strong>4 formas</strong> en las que se presenta la Leptospirosis Canina: <strong>Sub-clínica, septicémica aguda, infección ambulatoria y crónica</strong>. Los detalles de cada uno de estos tipos son bastante diferentes, aunque no son el motivo de este artículo; donde quiero enfocarme en la parte netamente práctica y en lo que tú puedes hacer para prevenirla.
    </p>

    <br>

    <p>
        Los síntomas en general son: fiebre, decaimiento, vómitos, diarrea, anorexia, hemorragias urinarias, ictericia (piel y mucosas amarillas), dolor en la zona lumbar, conjuntivitis y lagañas de color gris en ambos ojos. La gravedad de la Leptospirosis Canina va a ser diferente en las 4 formas de presentación, siendo normalmente la presentación septicémica aguda y la crónica las más graves.
    </p>

    <br>

    <h3 class="text-lg font-bold">Forma clásica</h3>

    <br>

    <p>
        La leptospirosis puede manifestarse a través de un amplio abanico de síntomas y puede confundirse con otras enfermedades infecciosas. Sin embargo, normalmente evoluciona mucho más rápido que el moquillo y la hepatitis vírica canina.
    </p>

    <br>

    <p>
        Los síntomas que provoca incluyen:
    </p>
    <ul class="list-disc ml-6">
        <li><strong>Fiebre alta</strong> (que puede disminuir después).</li>
        <li><strong>Gastroenteritis</strong>, con vómitos y diarrea que pueden contener sangre.</li>
        <li><strong>Ictericia</strong> (coloración amarillenta), como consecuencia de la alteración del hígado.</li>
        <li><strong>Orina oscura</strong>.</li>
        <li><strong>Deshidratación</strong> acusada.</li>
        <li><strong>Congestión de las mucosas</strong>.</li>
        <li><strong>Letargo</strong>.</li>
        <li><strong>Insuficiencia renal aguda</strong>.</li>
        <li>Y, en última instancia, la posible <strong>muerte</strong> del animal.</li>
    </ul>

    <br>

    <p>
        Algunos perros se recuperan lentamente, pero al principio pueden sufrir pequeños ataques recurrentes. Al final, aparte de la diseminación de la enfermedad que tiene lugar durante meses a través de la orina, los perros recuperan la normalidad, aunque es posible que sufran alguna secuela permanente en el riñón que puede limitar su calidad de vida o disminuir su esperanza de vida.
    </p>

    <br>

    <h3 class="text-lg font-bold">Diagnóstico clínico</h3>

    <br>

    <p>
        Debido a las similitudes con otras enfermedades, tanto infecciosas como de otro tipo, hay pocos signos clínicos que permitan un diagnóstico inequívoco. El veterinario puede pedir pruebas diagnósticas debido al riesgo de infección para las personas y la necesidad de escoger el tratamiento adecuado.
    </p>

    <br>

    <h3 class="text-lg font-bold">Pruebas diagnósticas</h3>
    <ul class="list-disc ml-6">
        <li>Las bacterias de <strong>Leptospira</strong> se pueden ver en la orina con un microscopio, pero no es un método fiable.</li>
        <li>Los análisis de sangre para detectar los <strong>anticuerpos</strong> fabricados contra las bacterias presentes en la sangre constituyen el método más útil para confirmar la infección en sus fases iniciales.</li>
    </ul>

    <br>

    <h3 class="text-lg font-bold">Tratamiento</h3>

    <br>

    <p>
        A diferencia de las infecciones causadas por los virus, la leptospirosis es una enfermedad <strong>bacteriana</strong>, y por esa razón puede ser tratada con diversos <strong>antibióticos</strong>. El tratamiento de soporte para los órganos dañados también resulta primordial.
    </p>

    <br>

    <p>
        El tratamiento necesario es el siguiente:
    </p>
    <ul class="list-disc ml-6">
        <li><strong>Tratamiento antibiótico</strong>.</li>
        <li>La <strong>rehidratación</strong> es con frecuencia una prioridad urgente, que debe llevarse a cabo prestando siempre atención a las concentraciones correctas de sales.</li>
        <li>Medicación para controlar los síntomas, como diarrea, vómitos y dolor.</li>
        <li>Medicación para limitar el daño orgánico extenso.</li>
        <li><strong>Cuidados</strong> para mantener al perro aseado y cómodo.</li>
    </ul>

    <br>

    <p>
        Es necesario plantearse con sensatez si conviene tener un perro portador de la enfermedad en un hogar en el que no es posible mantener una higiene adecuada.
    </p>
</div>


                    
                    ' />



                <x-faq-item question="HEPATITIS"
                    answer='
                    
                    <div class="text-justify leading-relaxed">
    <p>
        <strong>Hepatitis vírica canina</strong> es una enfermedad que afecta únicamente a los perros y no guarda relación alguna con la hepatitis humana. La enfermedad es hoy mucho menos frecuente gracias a la eficacia de las vacunas. Sin embargo, esta enfermedad extremadamente contagiosa y en ocasiones mortal todavía se puede observar en la consulta veterinaria, sobre todo en cachorros que no han sido vacunados.
    </p>

    <br>

    <h3 class="text-lg font-bold">CAUSAS</h3>

    <br>

    <p>
        La hepatitis vírica canina (antes llamada enfermedad de Rubarth) está causada por un virus, el adenovirus canino del tipo 1. En Europa, afecta fundamentalmente a perros y zorros.
    </p>

    <br>

    <p>
        La principal fuente de infección es la ingestión de orina, heces o saliva de perros infectados. Los perros que se recuperan de la infección pueden excretar el virus a través de la orina durante 6 meses. El virus es resistente a muchos desinfectantes y puede perdurar intacto en el entorno durante semanas o meses. Los cachorros muy jóvenes pueden morir en el plazo de unas pocas horas y en situaciones de hacinamiento el contagio es muy rápido. Al igual que sucede con el moquillo, la introducción de un cachorro nuevo infectado en un grupo, quizás procedente de un criador no profesional, desata a menudo la aparición de un brote de la enfermedad. No obstante, en los refugios de animales es una enfermedad menos frecuente.
    </p>

    <br>

    <p>
        La infección afecta primero al tejido linfático localizado alrededor de la cabeza, antes de pasar a otros órganos, sobre todo al hígado. Las muertes son frecuentes, aunque se administre un tratamiento.
    </p>

    <br>

    <h3 class="text-lg font-bold">SÍNTOMAS</h3>

    <br>

    <p>
        Los síntomas oscilan entre signos muy leves y la muerte repentina.
    </p>

    <br>

    <p><strong>Forma hiperaguda (en cachorros jóvenes)</strong></p>

    <br>

    <p>
        Los cachorros de menos de 3 semanas pueden manifestar de repente dolor en el abdomen y la muerte puede sobrevenir en pocas horas. La mayoría de los cachorros procedentes de fuentes fiables disfrutan de una protección temporal heredada de la madre (perras madres debidamente vacunadas), de modo que esta forma de la enfermedad es hoy rara.
    </p>

    <br>

    <p><strong>Forma aguda (enfermedad clásica)</strong></p>

    <br>

    <p>
        Los casos en una fase inicial llegan a la consulta del veterinario tan sólo con una letargia acusada. En la exploración, el veterinario observa que presentan temperatura elevada e inflamación de las amígdalas (amigdalitis), así como un intenso enrojecimiento de las mucosas e inflamación de los ganglios linfáticos situados debajo de la mandíbula. La amigdalitis aguda no es frecuente en los perros y debe levantar claras sospechas.
    </p>

    <br>

    <p>
        Este cuadro evoluciona con rapidez a vómitos y/o diarrea, que se acompañan de una pérdida completa del apetito; en algunos casos la luz intensa causa dolor. El hígado aparece agrandado y doloroso a la palpación. A medida que la función del hígado se va alterando aparece ictericia y comienzan a sangrar las encías. Llegados a este punto, las mucosas adquieren un color pálido o amarillento (ictericia). El perro presenta los músculos del abdomen tensos y contraídos a causa del dolor y cerca de 1 de cada 5 animales afectados acaba muriendo. Los que sobreviven a la fase aguda se recuperan completamente, aunque pueden tardar muchas semanas en restablecerse.
    </p>

    <br>

    <p><strong>Forma leve</strong></p>

    <br>

    <p>
        Algunos perros sólo presentan fiebre poco elevada y a veces diarrea, pero muestran los ganglios linfáticos inflamados.
    </p>

    <br>

    <p><strong>Variantes</strong></p>

    <br>

    <p>
        El cuadro clínico es mucho menos variado que en el caso del moquillo. No obstante, muy de vez en cuando pueden aparecer convulsiones, lo que puede conducir erróneamente a un diagnóstico de moquillo. No es infrecuente que un perro sufra simultáneamente una infección por el virus de moquillo de la hepatitis vírica canina. El edema corneal (que por el aspecto que da al ojo del animal suele recibir comúnmente el nombre de “ojo azul”) es un trastorno que se observa en muchos de los perros que sufren la enfermedad, dependiendo de la cepa del virus. Aparece unos 10 días después de los primeros síntomas, durante la fase de recuperación. Está causado por la formación de edema en la superficie del ojo, que le da un aspecto turbio y azulado, y desaparece de manera espontánea, sin necesidad de tratamiento. Este puede ser el único síntoma de la enfermedad que percibe el propietario.
    </p>

    <br>

    <h3 class="text-lg font-bold">DIAGNÓSTICO</h3>

    <br>

    <p><strong>Diagnóstico clínico</strong></p>

    <br>

    <p>
        A partir de los signos observados (formas agudas) y los antecedentes del animal, el veterinario puede emitir un diagnóstico.
    </p>

    <br>

    <p>
        En la forma leve puede resultar más difícil, ya que los síntomas son bastante ambiguos.
    </p>

    <br>

    <p><strong>Pruebas diagnósticas</strong></p>

    <br>

    <p>
        Los casos de la forma clásica de la enfermedad se pueden diagnosticar clínicamente, aunque podría ser recomendable recurrir a análisis de laboratorio para confirmar el diagnóstico.
    </p>

    <br>

    <p>
        El virus CAV-1 puede detectarse en un laboratorio convencional con pruebas de ADN y otros métodos a partir de una biopsia extraída del hígado o de un ganglio linfático inflamado.
    </p>

    <br>

    <p>
        En la necropsia, el hígado presenta cambios característicos cuando se observa una muestra al microscopio.
    </p>

    <br>

    <h3 class="text-lg font-bold">TRATAMIENTO</h3>

    <br>

    <p>
        El CAV-1 no se puede tratar directamente y el tratamiento se limita a intentar que los daños que ocasiona en el animal sean los mínimos. Muchas veces los perros mueren a pesar del tratamiento.
    </p>

    <br>

    <p><strong>El tratamiento necesario es el siguiente:</strong></p>

    <ul class="list-disc ml-6">
        <li>Tratamiento antibiótico para controlar las infecciones bacterianas secundarias.</li>
        <li>Medicación para controlar los síntomas, como diarrea, vómitos, insuficiencia hepática o los problemas de coagulación de la sangre.</li>
        <li>Intentar que el perro coma una dieta especial para la insuficiencia hepática.</li>
        <li>Guardar reposo absoluto, nada de ejercicio. Muchos animales pueden sufrir una recaída grave cuando, aparentemente recuperados, dan su primer paseo.</li>
        <li>Antiinflamatorios.</li>
        <li>Es necesario tener en cuenta que el hígado eliminará con lentitud algunos medicamentos y quizás sea preciso reducir las dosis o ampliar el intervalo de administración de los mismos, circunstancia que el veterinario tendrá en cuenta.</li>
        <li>Los perros infectados y los que hayan estado en contacto con ellos deben permanecer aislados de otros perros sensibles y es preciso adoptar medidas de higiene (cambio de ropa de las personas en contacto con el animal infectado, uso de desinfectantes adecuados).</li>
    </ul>

    <br>

    <h3 class="text-lg font-bold">PREVENCIÓN</h3>

    <br>

    <p>
        La prevención se basa en la vacunación. La hepatitis vírica canina siempre forma parte de la primera vacunación de los cachorros y a menudo también de las dosis de recuerdo anuales.
    </p>

    <br>

    <p>
        Muchas vacunas contra la hepatitis vírica contienen la cepa CAV-2 en lugar de la CAV-1, ya que proporciona una protección cruzada contra ciertas formas de la tos de las perreras y es menos probable que provoque la aparición de edema corneal.
    </p>

    <br>

    <p>
        Según la situación particular de su perro, el veterinario escogerá el protocolo más adecuado para sus necesidades. Tener la cartilla de trabajo de vacunación al día es un requisito obligatorio para asistir a las exposiciones y las residencias caninas.
    </p>
</div>

                    
                    ' />
            </div>
        </div>
    </div>


</x-layout>
