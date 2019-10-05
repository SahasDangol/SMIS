<?php

namespace App\Exceptions;

use App\Traits\validateResponse;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use validateResponse;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws Exception
     */
    public function render($request, Exception $exception)
    {

        if(config('app.debug'))
        {
            return parent::render($request, $exception);
        }
        //**************************************worked*************************************************************
        if ($exception instanceof UnauthorizedException) //authorize nahuda
        {
            return redirect('/response_error?message=User have not permission for this page access.');
        }

        if ($exception instanceof ModelNotFoundException) //id nabhako kura search garda aauney error
        {
            $model_name=ucfirst(class_basename($exception->getModel()));

            Session::flash('type', 'danger');
            Session::flash('message', $model_name.' not found with the given identifier.');//405

            return redirect()->back();
        }

        if ($exception instanceof MethodNotAllowedHttpException) // jastai create method allow nahuda create garna khojda aauney error
        {
            return redirect('/response_error?message=The specified method for the request is invalid');
        }

        if ($exception instanceof NotFoundHttpException) //invalid url haru halda aauney error
        {
            return redirect('/response_error?message=The requested url is not valid.');
        }

        //**************************************worked*************************************************************
        if ($exception instanceof AuthenticationException)
        {
            return redirect('/response_error?message=Unauthenticated');
//            return $this->message('Unauthenticated');
        }

        if ($exception instanceof AuthorizationException)
        {
            return redirect('/response_error?message='.$exception->getMessage());//403
        }

        if ($exception instanceof HttpException) {
            return redirect('/response_error?message='.$exception->getMessage());//403
        }

        if ($exception instanceof QueryException) {
            $errorCode=$exception->errorInfo[1];

            if($errorCode == 1451)
            {
                return redirect('/response_error?message=Cannot remove this resource permanently. It is related with other resources.');
            }
        }

        if ($exception instanceof ValidationException) {
            return $this->convertValidationExceptionResponse($exception,$request);
        }



        Session::flash('type', 'danger');
        Session::flash('message', 'Unexpected Exception. Try Later');//405

        return redirect()->back();

    }

    /**
     * Create a response object from the given validation exception.
     *
     * @param  \Illuminate\Validation\ValidationException  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */

    private function convertValidationExceptionResponse($e, $request)
    {
        if ($e->response) {
            return $e->response;
        }

        return $request->expectsJson()
            ? $this->invalidJson($request, $e)
            : $this->invalid($request, $e);
    }

    /**
     * Convert a validation exception into a response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Validation\ValidationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function invalid($request, ValidationException $exception)
    {
        return redirect($exception->redirectTo ?? url()->previous())
            ->withInput(array_except($request->input(), $this->dontFlash))
            ->withErrors($exception->errors(), $exception->errorBag);
    }

    /**
     * Convert a validation exception into a JSON response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Validation\ValidationException  $exception
     * @return \Illuminate\Http\JsonResponse
     */
    protected function invalidJson($request, ValidationException $exception)
    {
        return response()->json([
            'message' => $exception->getMessage(),
            'errors' => $exception->errors(),
        ], $exception->status);
    }

    private function message($message)
    {

//        return redirect($_SERVER['HTTP_REFERER']);
    }

}
