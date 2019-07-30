<?php 
    namespace App\Controller;

    use App\Entity\Script;
    use App\Entity\Movie;
    use App\Controller\HomeController;
    use App\Service\ScriptMetrics;
    use FOS\RestBundle\Controller\AbstractFOSRestController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpKernel\Exception\RouterListener;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\Routing\Annotation;
    use App\Service;



    class HomeController extends AbstractFOSRestController {

        /**
         * @Route("/", name="home")
         * @Method({"GET", "POST"})
         * 
         */

        public function index() {
            $ScriptTitles = $this->getDoctrine()->getRepository(Script::class)->findAll();
            return $this->render('pages/index.html.twig', array('ScriptTitles' => $ScriptTitles ));
        }   


        /** 
        * @Route("/scripts/", name="scripts")
        * @Method({"GET", "POST"})  
        */
        public function scripts() {
            $ScriptTitles = $this->getDoctrine()->getRepository(Script::class)->findAll();
            return $this->render('pages/scripts_home.html.twig', array('ScriptTitles' => $ScriptTitles ));
        }


        /** 
        * @Route("/script/{id}", name="script_info")
        * @Method({"GET", "POST"})  
        */
        public function script($id) {
            $script = $this->getDoctrine()->getRepository(Script::class)->find($id);
            return $this->render('pages/script.html.twig', array('ScriptTitles' => $script));
        }



        /** 
         * @Route("/add/", name="script_admin")
         * @Method({"GET", "POST"})  
         */
    
        //add a script to the list on /scripts
        public function add_script(Request $request) {
            $script_admin = new Script();

            $form = $this->createFormBuilder($script_admin)
                ->add('title', 
                    TextareaType::class, 
                    array(
                        'attr' => array(
                        'class' => 'form-control')))
                ->add('body', 
                    TextareaType::class, 
                    array(
                        'attr' => array(
                        'class' => 'form-control')))
                ->add('company', 
                    TextareaType::class, 
                    array(
                        'attr' => array(
                            'class' => 'form-control')))
                ->add('actor_name', 
                    TextareaType::class, 
                    array(
                        'attr' => array(
                            'class' => 'form-control')))
                ->add('actor_pay', 
                    TextareaType::class, 
                    array(
                        'attr' => array(
                            'class' => 'form-control')))
                ->add('actor_revenue', 
                        TextareaType::class, 
                        array(
                            'required' => false,
                            'attr' => array(
                                'class' => 'form-control')))
                ->add('company_revenue', 
                        TextareaType::class, 
                        array(
                            'required' => false,
                            'attr' => array(
                                'class' => 'form-control')))
                ->add('losses', 
                        TextareaType::class, 
                        array(
                            'required' => false,
                            'attr' => array(
                                'class' => 'form-control')))
                ->add('save', 
                    SubmitType::class, 
                        array(
                            'label' => 'Save', 
                            'attr' => array(
                            'class' => 'btn btn-primary mt-3')))         
                ->getForm();
        
            //submit form
            $form->handleRequest($request);

        //send data from form to database
        if($form->isSubmitted() && $form->isValid()){
            $script_admin = $form->getData();
            //create entity manager
            $entityManager = $this->getDoctrine()->getManager();
            //get values from the cached script data
            $body = $script_admin->getBody();
            $actor_name = $script_admin->getActorName();
            $company = $script_admin->getCompany();
            //count # of lines 
            $lines = preg_split("/" . $actor_name . "/", $body);
            $lines_per_actor = count($lines);
            //cache that
            $script_admin->setLinesPerActor($lines_per_actor);
            #count how many words in script #todo elaborate on this
            $words_per_actor = str_word_count($body);
            $script_admin->setWordsPerActor($words_per_actor);
            #mentions in a script #todo elaborate
            $mentions_per_actor = substr_count($body, $actor_name);
            $script_admin->setMentionsPerActor($mentions_per_actor); 
            switch ($company) {
                case 'Netflix':
                    $script_admin->setMoviesPerYear('38');
                    $script_admin->setPercentOfFails('0');
                    break;
                case 'Disney':
                    $script_admin->setMoviesPerYear('13');
                    $script_admin->setPercentOfFails('3');
                    break;
                case 'Warner Bros':
                    $script_admin->setMoviesPerYear('49');
                    $script_admin->setPercentOfFails('6');
                case 'NBC':
                    $script_admin->setMoviesPerYear('36');
                    $script_admin->setPercentOfFails('12');
                    break;
                case 'Sony':
                    $script_admin->setMoviesPerYear('48');
                    $script_admin->setPercentOfFails('7');
                    break;
                case 'MGM':
                    $script_admin->setMoviesPerYear('3');
                    $script_admin->setPercentOfFails('3');
                    break;
                case 'Lionsgate':
                    $script_admin->setMoviesPerYear('20');
                    $script_admin->setPercentOfFails('1');
                    break;
                case 'DreamWorks':
                    $script_admin->setMoviesPerYear('1');
                    $script_admin->setPercentOfFails('0');
                    break;
                case 'Paramount':
                    $script_admin->setMoviesPerYear('12');
                    $script_admin->setPercentOfFails('1');
                    break;
                default: 
                    $script_admin->setMoviesPerYear(NULL);
                    $script_admin->setPercentOfFails(NULL);
            }
     
            //save new data in cache
            $entityManager->persist($script_admin);
            // insert data into db
            $entityManager->flush();
            //redirect page
            return $this->redirectToRoute('scripts');
        }

        return $this->render('pages/script_admin.html.twig', array('form' => $form->createView()));

        $admin = $this->getDoctrine()->getRepository(Script::class)->findAll();
    }



        /**
        * @Route("/script/edit/{id}", name="script_edit")
        * @Method({"GET", "POST"})
        */

        //page with form from when click edit on /scripts_home
        public function script_edit(Request $request, $id) {
            $script = new Script();
            $script = $this->getDoctrine()->getRepository(Script::class)->find($id);
            $form = $this->createFormBuilder($script)
                ->add('title', 
                    TextareaType::class, 
                    array(
                        'attr' => array(
                            'class' => 'form-control')))
                ->add('body', 
                    TextareaType::class, 
                    array(
                        'attr' => array(
                            'class' => 'form-control')))
                ->add('company', 
                    TextareaType::class, 
                    array(
                        'attr' => array(
                            'class' => 'form-control')))
                ->add('actor_name', 
                    TextareaType::class, 
                    array(
                        'attr' => array(
                            'class' => 'form-control')))
                ->add('actor_pay', 
                    TextareaType::class, 
                    array(
                        'attr' => array(
                            'class' => 'form-control')))
                ->add('actor_revenue', 
                        TextareaType::class, 
                        array(
                            'required' => false,
                            'attr' => array(
                                'class' => 'form-control')))
                ->add('company_revenue', 
                        TextareaType::class, 
                        array(
                            'required' => false,
                            'attr' => array(
                                'class' => 'form-control')))
                ->add('losses', 
                        TextareaType::class, 
                        array(
                            'required' => false,
                            'attr' => array(
                                'class' => 'form-control')))
                ->add('save', 
                    SubmitType::class, 
                    array(
                        'label' => 'Save', 
                        'attr' => array(
                            'class' => 'btn btn-primary mt-3')))         
                ->getForm();
            //submit form
            $form->handleRequest($request);

            //send data from form to database
            if($form->isSubmitted() && $form->isValid()){

            //create entity manager
            $entityManager = $this->getDoctrine()->getManager();
            //flush cache 
            $entityManager->flush();
            //redirect
            return $this->redirectToRoute('scripts');
            }

            return $this->render('pages/edit.html.twig', array('form' => $form->createView()));

            $movie = $this->getDoctrine()->getRepository(Script::class)->findAll();

        }   

        /**
        * @Route("/new_script_1", name="create_script_1")
        */
        public function createScript1(): Response #makes new script w default values
        {
            $entityManager = $this->getDoctrine()->getManager();

            $newScript1 = new Script();
            $newScript1->setLinesPerActor(0);
            $newScript1->setWordsPerActor('0');
            $newScript1->setMentionsPerActor('0');
            $newScript1->setMoviesPerYear(10);
            $newScript1->setPercentOfFails(5);

            // tell Doctrine to save the script data for use in future (but no db queries yet)
            $entityManager->persist($newScript1);

            // saves data, executes INSERT query 
            $entityManager->flush();

    }


        /**
         * @Route("/movies/delete/{id}", name="movie_delete")
         * @Method({"DELETE"})
         */
        public function delete(Request $request, $id) { #todo - reenable this
            //find the movie by id
            $movie = $this->getDoctrine()->getRepository(Movie::class)->find($id);

                //create entity manager
                $entityManager = $this->getDoctrine()->getManager();
                //delete the data
                $entityManager->remove($movie);
                //flush cache 
                $entityManager->flush();

                $response = new Response();
                $response->send();

         }




}
    