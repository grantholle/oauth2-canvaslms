<?php

namespace smtech\OAuth2\Client\Traits;

use Illuminate\Http\Request;
use League\OAuth2\Client\Token\AccessTokenInterface;
use smtech\OAuth2\Client\Provider\CanvasLMSOAuthProvider;

trait AuthenticatesWithCanvas
{
    /**
     * Sends the user to be authenticated
     *
     * @param CanvasLMSOAuthProvider $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(CanvasLMSOAuthProvider $provider)
    {
        $url = $provider->getAuthorizationUrl();
        session()->put('canvas_state', $provider->getState());

        return redirect($url);
    }

    /**
     * @param Request $request
     * @param CanvasLMSOAuthProvider $provider
     * @return mixed
     * @throws \League\OAuth2\Client\Provider\Exception\IdentityProviderException
     */
    public function verify(Request $request, CanvasLMSOAuthProvider $provider)
    {
        if (
            !$request->has('state') ||
            session()->pull('canvas_state') !== $request->input('state') ||
            !$request->has('code')
        ) {
            return $this->failedVerification($request);
        }

        $token = $provider->getAccessToken('authorization_code', $request->only('code'));
        $user = $provider->getResourceOwner($token)->toArray();

        return $this->verified($token, $user);
    }

    /**
     * This gets called once the user has been verified.
     * Here you will need to save the token somehow
     * and use the user's info to log in the user
     * at your own discretion
     *
     * @param AccessTokenInterface $token
     * @param array $user
     * @return mixed
     */
    protected function verified(AccessTokenInterface $token, array $user)
    {
        //
    }

    /**
     * This gets called if the user has invalid
     * state between the login attempt and verification
     *
     * @param Request $request
     * @return mixed
     */
    protected function failedVerification(Request $request)
    {
        return response(null, 403);
    }
}
