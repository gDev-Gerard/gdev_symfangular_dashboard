<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\File\Exception\FileException;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Sympfony\Component\HttpFoundation\BinaryFileResponse;
    use Symfony\Component\Routing\Attribute\Route;

    class EventDashboardController extends AbstractController
    {
        // ============== Routes GET =================
        #[Route('/event-dashboard', methods: ['GET'])]
        public function index(): JsonResponse
        {
            die('MakkingOf - PAGINA DE ENTRADA');
        }

        #[Route('/event-dashboard/{id}', methods: ['GET'])]
        public function show(int $id): JsonResponse
        {
            return $this->json
            (
                ['messaje'=>"MakkingOf - GET | show {$id}"]
            );
        }

        #[Route('/event-dashboard-query', methods: ['GET'])]
        public function queryString(Request $request): JsonResponse
        {
            return $this->json
            (
                [
                    'state' => "OK",
                    'message' => "MakkingOf - GET | id={$request->query->get('id')}",
                    'message2' => "MakkingOf - GET | slung={$request->query->get('slug')}"
                ]
            );
        }

        #[Route('/event-dashboard-protected', methods: ['GET'])]
        public function protected(Request $request): JsonResponse
        {
            return $this->json
            (
                [
                    'header' => "MakkingOf - GET - Protected | protected route = {$request->headers->get('X-AUTH-TOKEN')}"
                ]
            );
        }

        // ============== Routes POST =================
        #[Route('/event-dashboard/', methods: ['POST'])]
        public function create(Request $request): JsonResponse
        {
            $data = json_decode( $request->getContent() ,true);
            return $this ->json(
                [
                    'event title' => "{$data['event_title']}",
                    'event date' => "{$data['event_date']}"
                ]
            );
        }

        #[Route('/event-dashboard-upload', methods: ['POST'])]
        public function upload(Request $request): JsonResponse
        {
            $picture = $request->files->get('picture');
            if($picture) {
                $newfilename = time() . '.' . $picture->guessExtension();

                try {
                    $picture -> move($this->getParameter('event-dashboard_directory'), $newfilename);

                }
                catch (FileException $e) {
                    return $this->json
                    (
                        [
                            'message0' => 'No se ha cargado el fichero'
                        ] , Response::HTTP_BAD_REQUEST
                    );
                }

            }
            else {
                return $this->json
                (
                    [
                        'message1' => 'No se ha cargado el fichero'
                    ] , Response::HTTP_BAD_REQUEST
                );
            }
            return $this->json
            (
                [
                    'message2' => 'No se ha cargado el fichero'
                ],Response::HTTP_OK
            );
        }

        // ============== Routes PUT =================

        #[Route('/event-dashboard/{id}', methods: ['PUT'])]
        public function update(int $id): JsonResponse
        {
            return $this->json
            (
                ['messaje'=>"MakkingOf - PUT | update {$id}"]
            );
        }

        #[Route('/event-dashboard-download', methods: ['PUT'])]
        public function download(): BinaryFileResponse
        {
            return $this->file('Uploads/Files/1753801718.png');
        }

        #[Route('/event-dashboard/{id}', methods: ['DELETE'])]
        public function delete(int $id): JsonResponse
        {
            return $this->json
            (
                ['messaje'=>"MakkingOf - DELETE | delete {$id}"]
            );
        }
    }
