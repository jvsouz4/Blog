<!-- File: /app/View/Infos/index.ctp -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <?php $this->set('title_for_layout', 'Sobre o desenvolvedor');?>
    </head>

    <body>
        <!-- Page header with logo and tagline-->
        <div class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder fontexto text-secondary">Sobre o desenvolvedor</h1>
                </div>
            </div>
        </div>
        <!-- Page Content-->
        <div class="container ">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div style="height:500px" class="card flex-row border-0 shadow rounded-3 overflow-auto">
                        <div class="card-body p-sm-3">
                            <div class="container-fluid p-0 ">
                                <!-- About-->
                                <section class="resume-section" id="about">
                                    <div class="resume-section-content">
                                        <h2 class="mb-2">
                                            <span class="text-primary">João Souza</span>
                                        </h2>
                                        <div class="subheading mb-2 text-secondary">
                                            <a>Estudante de ciências e tecnologia</a>
                                        </div>
                                        <p class="subheading mb-0">Olá, me chamo João Victor, tenho 22 anos.</p>
                                        <p class="subheading mb-2">Atualmente, sou estudante de ciências e tecnologia na Universidade Federal do Rio Grande do Norte (UFRN), 
                                            trabalho desempenhando função de suporte na empresa Rede Mais Você e no meu tempo livre tenho me dedicado a estudar programação.
                                        </p>
                                        <div class="social-icons mb-2">
                                            <a href="https://instagram.com/jvsouz4" target="_blank"><img src="https://img.shields.io/badge/-Instagram-%23E4405F?style=for-the-badge&logo=instagram&logoColor=white" target="_blank"></a>
                                            <a href="mailto:joaovsouz@gmail.com"><img src="https://img.shields.io/badge/-Gmail-%23333?style=for-the-badge&logo=gmail&logoColor=white" target="_blank"></a>
                                            <a href="https://github.com/jvsouz4"><img src="https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white" target="_blank"></a>
                                            <a href="https://www.linkedin.com/in/jvsouz4" target="_blank"><img src="https://img.shields.io/badge/-LinkedIn-%230077B5?style=for-the-badge&logo=linkedin&logoColor=white" target="_blank"></a>
                                        </div>
                                    </div>
                                </section>
                                <hr class="my-2" />
                                <!-- Experience-->
                                <section class="resume-section" id="experience">
                                    <div class="resume-section-content">
                                        <h3 class="mb-2 text-primary">Experiência</h3>
                                        <div class="d-flex flex-column flex-md-row justify-content-between mb-2">
                                            <div class="flex-grow-1">
                                                <h4 class="lead fw-bold mb-2">Suporte de informática</h4>
                                                <div class="subheading text-secondary mb-2">Rede Mais Você</div>
                                            </div>
                                            <div class="flex-shrink-0"><span class="text-primary">Julho de 2022 - Presente</span></div>
                                        </div>
                                        <div class="d-flex flex-column flex-md-row justify-content-between mb-2">
                                            <div class="flex-grow-1">
                                                <h4 class="lead fw-bold mb-2">Técnico em informática</h4>
                                                <div class="subheading text-secondary mb-2">União de Ensino Superior da Paraíba</div>
                                            </div>
                                            <div class="flex-shrink-0"><span class="text-primary">Novembro de 2018 - Janeiro 2020</span></div>
                                        </div>
                                        <div class="d-flex flex-column flex-md-row justify-content-between mb-2">
                                            <div class="flex-grow-1">
                                                <h4 class="lead fw-bold mb-2">Suporte técnico em informática</h4>
                                                <div class="subheading text-secondary mb-0">Autônomo</div>
                                            </div>
                                            <div class="flex-shrink-0"><span class="text-primary">2013 - Presente</span></div>
                                        </div>
                                    </div>
                                </section>
                                <hr class="my-2" />
                                <!-- Education-->
                                <section class="resume-section" id="education">
                                    <div class="resume-section-content">
                                        <h3 class="mb-2 text-primary">Educação</h3>
                                        <div class="d-flex flex-column flex-md-row justify-content-between mb-2">
                                            <div class="flex-grow-1">
                                                <h4 class="lead fw-bold mb-2">Universidade Federal do Rio Grande do Norte</h4>
                                                <div class="subheading text-secondary mb-2">Bacharelado Interdisciplinar em Ciências e Tecnologia</div>
                                            </div>
                                            <div class="flex-shrink-0"><span class="text-primary">Agosto de 2019 - Dezembro de 2024</span></div>
                                        </div>
                                        <div class="d-flex flex-column flex-md-row justify-content-between">
                                            <div class="flex-grow-1">
                                                <h4 class="lead fw-bold mb-2">CDF Colégio e Curso</h4>
                                                <div class="subheading text-secondary mb-0">Ensino médio</div>
                                            </div>
                                            <div class="flex-shrink-0"><span class="text-primary">Fevereiro de 2011 - Dezembro de 2017</span></div>
                                        </div>
                                    </div>
                                </section>
                                <hr class="my-2" />
                                <!-- Skills-->
                                <section class="resume-section" id="skills">
                                    <div class="resume-section-content">
                                        <h3 class="text-primary">Skills</h3>
                                        <div class="subheading text-secondary  my-2">Linguagens de programação e ferramentas utilizadas</div>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item"><i class="fs-2 devicon-html5-plain-wordmark colored"></i></li>
                                            <li class="list-inline-item"><i class="fs-2 devicon-css3-plain-wordmark colored"></i></li>
                                            <li class="list-inline-item"><i class="fs-2 devicon-javascript-plain colored"></i></li>
                                            <li class="list-inline-item"><i class="fs-2 devicon-php-plain colored"></i></li>
                                            <li class="list-inline-item"><i class="fs-2 devicon-git-plain colored"></i></li>
                                            <li class="list-inline-item"><i class="fs-2 devicon-github-original colored"></i></li>
                                            <li class="list-inline-item"><i class="fs-2 devicon-docker-plain colored"></i></li>
                                            <li class="list-inline-item"><i class="fs-2 devicon-cakephp-plain colored"></i></li>
                                            <li class="list-inline-item"><i class="fs-2 devicon-bootstrap-plain colored"></i></li>
                                            <li class="list-inline-item"><i class="fs-2 devicon-vscode-plain colored"></i></li>
                                        </ul>
                                <hr class="my-2" />
                                <!-- Awards-->
                                <section class="resume-section" id="awards">
                                    <div class="resume-section-content">
                                        <h3 class="text-primary">Cursos e certificados</h3>
                                        <div class="subheading text-secondary my-2">Meu perfil e certificados na Alura</div>
                                        <ul class="list-inline my-2">
                                            <li class="list-inline-item">
                                                <a href="https://cursos.alura.com.br/user/jvsouz4"><img style="width: 30px; height: 30px" class="rounded my-2" src="https://cursos.alura.com.br/assets/images/alura/favicon.ico" target="_blank"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>