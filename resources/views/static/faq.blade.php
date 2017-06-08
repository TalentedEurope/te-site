@extends('../layouts.app')

@section('page-title') {{ trans('global.faq') }} @endsection

@section('content')
<div class="container edit-profile">
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <h2 class="page-title">{{ trans('global.faq') }}</h2>
      <div class="well">
      @if (Config::get('app.locale') == 'en')
      <ol>
        <li><strong>What is Talented Europe?</strong><br/>
        Talented Europe is a project with a multiplatform application, an online/onphone ‘app’ which aims to match top students to job and internship opportunities across Europe. It enables talented students and companies from all continents to connect with each other on a professional level.</li>
        <li><strong>What type of professional connections does the Talented Europe platform offer?</strong><br/>Using the platform advanced students are able to find more easily their suitable internship or work placements. </li>
        <li><strong>Who can participate in Talented Europe?</strong><br/>
        The participators are to be students, educational institutions and companies from all continents.</li>
        <li><strong>How does the Talented Europe platform function for students?</strong><br/>
        <ol>
        <li>A student is looking for a job and joins Talented Europe (talentedeurope.eu) and asks his university to validate his profile.</li>
        <li>The student’s university receives a notification. A professor reviews his/her academic performance and validates that s/he is able to join the ranks of the elite students of Talented Europe.</li>
        <li>A business registered on the Talented Europe platform finds the student’s CV and contact him/her for an interview. Also, alternatively, a student can directly apply for the job offered by the company. S/he receives a notification on the mobile app or the website, and books a meeting with them.</li>
        </ol>
        <li><strong>How does the Talented Europe platform function for institutions?</strong><ol>

        <li>A student is looking for a job and joins Talented Europe (talentedeurope.eu). There s/he asks his professors to confirm his talents, in order to have more information to provide for the companies.</li>
        <li>Professors assess the student’s abilities, confirming the skills and knowledge that may be of benefit to the company.</li>
        <li>Thanks to the references and evaluations by professors, companies can obtain reliable and quality information about the students, which will improve the selection process.</li></ol>
        <li><strong>How does the Talented Europe platform function for companies?</strong></li><ol><li>A company executive recognizes a need for an intern or starter with particular skills. Joins Talented Europe (talentedeurope.eu) and posts job requirements.</li>
        <li>Company executive can also scan the Talented Europe database for students with the necessary skills.</li>
        <li>Company executive finds appropriate students’ CV and contacts them via the mobile app or the website to arrange an interview, either in person or online.</li>
        </ol>
        <li><strong>Who arranges the documentation?</strong><br/>
        Once the internship or job is arranged through the Talented Europe platform the student and the company  are to handle any necessary documentation.</li>
      </ol>
      @elseif (Config::get('app.locale') == 'es')
        <ol>
        <li><strong>¿Qué es Talented Europe?</strong><br/>
        Es un proyecto cofinanciado por el programa Erasmus+ de la Unión Europea. El proyecto Erasmus Plus «Talented Europe» aborda dos iniciativas emblemáticas de la estrategia «Europa 2020», que son ‘Youth on the Move’ y ‘Agenda for New Skills and Jobs’. Este proyecto mediante una aplicación multiplataforma, una "aplicación" en línea/ móvil tiene como objetivo hacer coincidir a los mejores estudiantes con oportunidades de trabajo y/o de prácticas en toda Europa. Permite a estudiantes con talento y empresas de todos los continentes conectarse entre sí a nivel profesional.</li>
        <li><strong>¿Quién puede participar en Talented Europe?</strong><br/>Los participantes serán estudiantes, instituciones educativas y empresas de todos los continentes. </li>
        <li><strong>¿Cuánto cuesta inscribirse?</strong><br/>
        Es gratuito para instituciones educativas, estudiantes y empresas.</li>
        <li><strong>¿Cómo debo inscribirme?</strong><br/>
        Debe hacer clic en el botón Registrarse y rellenar los campos necesarios con su información personal.</li>
        <li><strong>¿Cómo funciona la plataforma Talented Europe para los estudiantes?</strong><br/>
        <ol>
        <li>Un estudiante está buscando un trabajo y se une a Talented Europe (talentedeurope.eu) y pide a su universidad que valide su perfil.</li>
        <li>La universidad del estudiante recibe una notificación. Un profesor revisa su rendimiento académico y valida que él/ella puede unirse a las filas de los estudiantes de élite de Talented Europe.</li>
        <li>Un negocio registrado en la plataforma Talented Europe encuentra el CV del estudiante y lo contacta para una entrevista. También, alternativamente, un estudiante puede solicitar directamente el trabajo ofrecido por la compañía. Recibe una notificación en la aplicación para dispositivos móviles o en el sitio web y reserva una reunión con ellos.</li>
        </ol>
        <li><strong>¿Cómo funciona la plataforma Talented Europe para las instituciones?</strong><ol>

        <li>Un estudiante está buscando un trabajo y se une a Talented Europe (talentedeurope.eu). Allí pide a sus profesores que confirmen sus talentos, para tener más información para proporcionar a las empresas.</li>
        <li>Los profesores evalúan las habilidades del estudiante, confirmando las habilidades y conocimientos que pueden ser beneficiosas para la empresa.</li>
        <li>Gracias a las referencias y evaluaciones de los profesores, las empresas pueden obtener información confiable y de calidad sobre los alumnos, lo que mejorará el proceso de selección.</li></ol>
        <li><strong>¿Cómo funciona la plataforma Talented Europe para las empresas?</strong></li><ol><li> Un/a ejecutivo/a de la empresa reconoce la necesidad de una persona en prácticas o recién titulado con habilidades específicas. Se une a Talented Europe (talentedeurope.eu) y publica los requisitos del puesto.</li>
        <li>El/La ejecutivo/a también puede buscar en la base de datos de Talented Europe para estudiantes con las habilidades necesarias.</li>
        <li> El/La ejecutivo/a de la empresa encuentra el CV apropiado de los estudiantes y los contacta a través de la aplicación móvil o del sitio web para concertar una entrevista, en persona o en línea.</li>
        </ol>
        <li><strong>¿Qué detalles debe proporcionar una empresa para registrarse?</strong><br/>
        Durante la inscripción, una empresa debe proporcionar toda la información pertinente, tales como: tipo, nombre del representante legal, número de registro, dirección y cargar su logotipo y un certificado de autenticidad (puede descargar la plantilla en la Web).</li>
        <li><strong>¿Cómo pueden los estudiantes contactar a las empresas?</strong><br/>
        Debe hacer clic en el botón Ver más de la empresa que encontró interesante. Usted será redirigido a la página de perfil de la empresa donde debe hacer clic en el botón Ver detalles de contacto.</li>
        <li><strong>¿Cómo pueden los empleadores contactar a los estudiantes?</strong><br/>
        Necesitas hacer clic en el botón Ver más del estudiante que encontraste interesante. Se le redirigirá a la página de perfil del estudiante donde deberá hacer clic en el botón Ver detalles del contacto.</li>
        <li><strong>¿Quién organiza la documentación?</strong><br/>
        Una vez que la práctica o el trabajo esté dispuesto a través de la plataforma Talented Europe, el estudiante y la empresa deberán manejar cualquier documentación necesaria.</li>
        <li><strong>¿Cómo puedo cambiar mis datos personales, correos electrónicos o contraseña?</strong><br/>
        Estudiantes: ingresando y accediendo a Configuración de perfil para editar sus datos.<br/>
        Empleadores: ingresando y accediendo a Configuración de perfil donde puede cambiar sus datos.</li>
        <li><strong>¿Cómo puedo eliminar mi cuenta?</strong><br/>
        Vaya a su página personal y, a continuación, Configuración del perfil. Una vez que esté en la página, desplácese hasta la parte inferior y verá una opción Eliminar cuenta y, al hacer clic en ella, se eliminará su cuenta.</li>
        <li><strong>He perdido mi contraseña, ¿qué debo hacer?</strong><br/>
        Si olvidó o perdió su contraseña, pulse la tecla ¿Olvidó su contraseña? bajo el portal de inicio de sesión. Será redirigido a otra página donde debe ingresar la dirección de correo electrónico con la que se registró y a continuación se le enviará a esa dirección de correo electrónico su enlace de restablecimiento de contraseña.</li>
        <li><strong>¿Cómo puedo contactar con usted?</strong><br/>
        Por favor, póngase en contacto con nosotros a través de la siguiente dirección de correo electrónico: info@talentedeurope.org</li>
      </ol>
      @else
      <ol>
        <li><strong>What is Talented Europe?</strong><br/>
        Talented Europe is a project with a multiplatform application, an online/onphone ‘app’ which aims to match top students to job and internship opportunities across Europe. It enables talented students and companies from all continents to connect with each other on a professional level.</li>
        <li><strong>What type of professional connections does the Talented Europe platform offer?</strong><br/>Using the platform advanced students are able to find more easily their suitable internship or work placements. </li>
        <li><strong>Who can participate in Talented Europe?</strong><br/>
        The participators are to be students, educational institutions and companies from all continents.</li>
        <li><strong>How does the Talented Europe platform function for students?</strong><br/>
        <ol>
        <li>A student is looking for a job and joins Talented Europe (talentedeurope.eu) and asks his university to validate his profile.</li>
        <li>The student’s university receives a notification. A professor reviews his/her academic performance and validates that s/he is able to join the ranks of the elite students of Talented Europe.</li>
        <li>A business registered on the Talented Europe platform finds the student’s CV and contact him/her for an interview. Also, alternatively, a student can directly apply for the job offered by the company. S/he receives a notification on the mobile app or the website, and books a meeting with them.</li>
        </ol>
        <li><strong>How does the Talented Europe platform function for institutions?</strong><ol>

        <li>A student is looking for a job and joins Talented Europe (talentedeurope.eu). There s/he asks his professors to confirm his talents, in order to have more information to provide for the companies.</li>
        <li>Professors assess the student’s abilities, confirming the skills and knowledge that may be of benefit to the company.</li>
        <li>Thanks to the references and evaluations by professors, companies can obtain reliable and quality information about the students, which will improve the selection process.</li></ol>
        <li><strong>How does the Talented Europe platform function for companies?</strong></li><ol><li>A company executive recognizes a need for an intern or starter with particular skills. Joins Talented Europe (talentedeurope.eu) and posts job requirements.</li>
        <li>Company executive can also scan the Talented Europe database for students with the necessary skills.</li>
        <li>Company executive finds appropriate students’ CV and contacts them via the mobile app or the website to arrange an interview, either in person or online.</li>
        </ol>
        <li><strong>Who arranges the documentation?</strong><br/>
        Once the internship or job is arranged through the Talented Europe platform the student and the company  are to handle any necessary documentation.</li>
      </ol>
      @endif
      </div>
    </div>
  </div>
</div>
@endsection
