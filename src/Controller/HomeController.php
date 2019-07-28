<?php 
    namespace App\Controller;
    use App\Entity\Script;
    use App\Entity\Movie;
    use App\Controller\HomeController;
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


    class HomeController extends AbstractFOSRestController {

        /**
         * @Route("/", name="home")
         * @Method({"GET", "POST"})
         * 
         */

        public function index() {
            $MovieTitles = $this->getDoctrine()->getRepository(Movie::class)->findAll();
            $ScriptTitles = $this->getDoctrine()->getRepository(Script::class)->findAll();
            return $this->render('pages/index.html.twig', array('MovieTitles' => $MovieTitles, 'ScriptTitles' => $ScriptTitles ));
        }   

        /**
         * @Route("/update", name="update")
         * @Method({"GET", "POST"})
         * 
         */
        public function update() {
            return 'hello';

        }

        /**
         * @Route("/movies", name="movies")
         * @Method({"GET", "POST"})
         * 
         */
        public function movies() {
            $MovieTitles = $this->getDoctrine()->getRepository(Movie::class)->findAll();
            return $this->render('pages/movies_home.html.twig', array('MovieTitles' => $MovieTitles ));
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
        * @Route("/movies/{id}", name="movie_info")
        * @Method({"GET", "POST"})  
        */
        public function movie($id) {
            $movie = $this->getDoctrine()->getRepository(Movie::class)->find($id);
            return $this->render('pages/movies.html.twig', array('MovieTitles' => $movie));
        }


        /**
         * @Route("/movies/delete/{id}", name="movie_delete")
         * @Method({"DELETE"})
         */
        public function delete(Request $request, $id) {
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


        /**
         * @Route("/movies/edit/{id}", name="movie_edit")
         * @Method({"GET", "POST"})
         */

        //page with form from when click edit on /movies_home
        public function movie_edit(Request $request, $id) {
        $movie = new Movie();
        $movie = $this->getDoctrine()->getRepository(Movie::class)->find($id);
        $form = $this->createFormBuilder($movie)
            ->add('title', 
                    TextType::class, 
                    array(
                        'attr' => array(
                            'class' => 'form-control')))
            ->add('company', 
                    TextareaType::class, 
                    array(
                        'required' => false,
                        'attr' => array(
                            'class' => 'form-control')))
            ->add('Actor', 
                    TextareaType::class,
                    array(
                        'required' => false,
                        'attr' => array(
                            'class' => 'form-control')))
            ->add('ActorPay', 
                    TextareaType::class, 
                    array(
                        'required' => false,
                        'attr' => array(
                            'class' => 'form-control')))
            ->add('ActorRevenue', 
                    TextareaType::class, 
                    array(
                        'required' => false,
                        'attr' => array(
                            'class' => 'form-control')))
            ->add('CompanyRevenue', 
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
            return $this->redirectToRoute('movies');
            }

            return $this->render('pages/edit.html.twig', array('form' => $form->createView()));

            $movie = $this->getDoctrine()->getRepository(Movie::class)->findAll();
        }



         /** 
        * @Route("/add/", name="admin")
        * @Method({"GET", "POST"})  
        */

        //add a movie to the list on /movies
        public function add(Request $request) {
            $movie_admin = new Movie();

            $form = $this->createFormBuilder($movie_admin)
            ->add('title', 
                    TextType::class, 
                    array(
                        'attr' => array(
                            'class' => 'form-control')))
             ->add('body', 
                    TextType::class, 
                    array(
                        'attr' => array(
                            'class' => 'form-control')))                           
            ->add('company', 
                    TextareaType::class, 
                    array(
                        'required' => false,
                        'attr' => array(
                            'class' => 'form-control')))
            ->add('Actor', 
                    TextareaType::class,
                    array(
                        'required' => false,
                        'attr' => array(
                            'class' => 'form-control')))                       
            ->add('ActorPay', 
                    TextareaType::class, 
                    array(
                        'required' => false,
                        'attr' => array(
                            'class' => 'form-control')))
            ->add('ActorRevenue', 
                    TextareaType::class, 
                    array(
                        'required' => false,
                        'attr' => array(
                            'class' => 'form-control')))
            ->add('CompanyRevenue', 
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
                $movie_admin = $form->getData();

                //create entity manager
                $entityManager = $this->getDoctrine()->getManager();
                //persist the data
                $entityManager->persist($movie_admin);
                //flush cache 
                $entityManager->flush();
                //redirect
                return $this->redirectToRoute('movies');
            }

            return $this->render('pages/admin.html.twig', array('form' => $form->createView()));

            $admin = $this->getDoctrine()->getRepository(Movie::class)->findAll();
        }

        /** 
         * @Route("/add_script/", name="script_admin")
         * @Method({"GET", "POST"})  
         */
    
    //add a script to the list on /scripts
    public function add_script(Request $request) {
        $script_admin = new Script();

        $form = $this->createFormBuilder($script_admin)
             ->add('linesPerActor', 
                TextareaType::class, 
                array(
                    'attr' => array(
                      'class' => 'form-control')))
             ->add('wordsPerActor', 
                TextareaType::class, 
                array(
                    'attr' => array(
                        'class' => 'form-control')))                           
            ->add('mentionsPerActor', 
                TextareaType::class, 
                array(
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control')))
            ->add('moviesPerYear', 
                TextareaType::class,
                array(
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control')))                       
            ->add('percentOfFails', 
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
            //persist the data
            $entityManager->persist($script_admin);
            //flush cache 
            $entityManager->flush();
            //redirect
            return $this->redirectToRoute('scripts');
        }

        return $this->render('pages/script_admin.html.twig', array('form' => $form->createView()));

        $admin = $this->getDoctrine()->getRepository(Script::class)->findAll();
    }



    /**
     * @Route("/new_script_1", name="create_script_1")
     */
    public function createScript1(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        $entityManager = $this->getDoctrine()->getManager();

        $newScript1 = new Script();
        $newScript1->setLinesPerActor(0);
        $newScript1->setWordsPerActor('0');
        $newScript1->setMentionsPerActor('0');
        $newScript1->setMoviesPerYear(10);
        $newScript1->setPercentOfFails(5);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($newScript1);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new script with id '. $newScript1->getId());
    }


        
}