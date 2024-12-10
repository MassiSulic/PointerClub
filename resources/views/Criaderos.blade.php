@php
    $headers = ['ASIJO', 'TITULAR', 'PROVINCIA', 'TEL.'];
    $rows = [
        ['DEL Estilo Y PASIÓN', 'Adrián Pérez Camacho', 'Valencia', '661944890'],
        ['DE CASTRONUEVO', 'Alfredo Fernández Zamora', 'Valladolid', '692208112'],
        ['DES FEUX DE LA PASSION', 'Angel Mercado Puerto', 'Zaragoza', '638050650'],
        ['DE Q\'SAR BERMEJA', 'Antonio F. Pardo Jurado', 'Malaga', '616746736'],
        ['DE PASARÍN', 'Antonio González Álvarez', 'Pontevedra', '650485673'],
        ['MAISALAND', 'Carlos Guitiérrez Martínez', 'Burgos', '630989197'],
        ['DE TORRES DA VARELA', 'Carlos Lalin Ferreiroa', 'Pontevedra', '659951396'],
        ['DA BRISA', 'Eliseo Faraldo Fernández', 'A Coruña', '609828746'],
        ['DEL CERCANO', 'Eugenio Cervantes Cano', 'Ciudad Real', '633645008'],
        ['DEL SOL DE NAVELINA', 'Francisco García Vicent', 'Valencia', '607714155'],
        ['DES CRISTO DEL VALLE', 'Francisco Palacios Olmedo', 'Toledo', '609236128'],
        ['DE URSAONESOL', 'Francisco Sánchez Ropero', 'Sevilla', '609576225'],
        ['DE AKELARRE', 'Gabriel Ayesta Ortúzar', 'Bizkaia', '659679439'],
        ['DES DIEUX DU VENT', 'Héctor Trullén del Campo', 'Zaragoza', '695639150'],
        ['DE GARCILLEJA', 'Iván García Calleja', 'Zaragoza', '686718923'],
        ['DE LA CAMPIÑUELA', 'Javier Bermúdez Chito', 'Malaga', '686168325'],
        ['DEBORRAS', 'Jesús Arnal López', 'Castellón', '654655124'],
        ['DEL TRAPIO', 'José Antonio Martinez del Viso', 'Toledo', '686386488'],
        ['D\'U PUIG', 'José Ganals Rebassa', 'Baleares', '630057946'],
        ['DE LA MAZORRA', 'José Condado González', 'Burgos', '619738006'],
        ['DE MIRANDAOLA', 'José Luis Aragón Diez', 'Zaragoza', '655679112'],
        ['DEL MANGUERIN', 'José Miguel Redruello Suárez', 'Asturias', '618620799'],
        ['DE LA PINEDA VELLA', 'Josep Pares Rosinol', 'Barcelona', '686471095'],
        ['DE OBARALES', 'Juan Miguel Palomo Roldán', 'Cadiz', '625595491'],
        ['DE LOS DESMONTES', 'Juaquín Bueno Bonilla', 'Jaén', '670668730'],
        ['DE LA CABRERA Y PUENTE', 'Luis Antonio Álvarez García', 'Leon', '660959985'],
        ['DE LA PLAZA DE LA MARE', 'Manuel Teijeira Veiga', 'Barcelona', '636234765'],
        ['DEL CAMP DE LLIRIA', 'Manuel Faubel Muñoz', 'Valencia', '639675557'],
        ['DE LA PLANA D\'ALBONS', 'Raúl Borrella Colomer', 'Girona', '620992061'],
        ['DE CASTROGALIA', 'Rubén Álvarez Candame', 'La Coruna', '659054753'],
    ];
@endphp

<x-layout>
    <div class="mt-48">
        <div class=" overflow-x-auto mb-24 lg:mx-48 sm:mx-20 ">
            <x-table :headers="$headers" :rows="$rows" />
        </div>
    </div>
</x-layout>
