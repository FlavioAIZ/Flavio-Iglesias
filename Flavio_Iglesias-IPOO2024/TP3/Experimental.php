<?php

    function EstaJugador($DNIS) :boolean
    {
        for (N=0;N<$this-->MaxJugadores-1;N+=1)
        {
            if $DNIS=(plantelJugadores[N]->getDNI())
            {
                return true,N;
            }
        }
        return false,N+1;
    }