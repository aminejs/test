<?php

namespace App\Tests\Integration\Controller\Api;

use App\Tests\Helpers\TestConstants;
use App\Tests\Integration\Helpers\ControllerTestHelpers;
use App\Utils\Constants;
use App\Utils\Messages;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MaxConsecutiveLetterOccurrencesRestControllerTest extends WebTestCase
{
    use ControllerTestHelpers;

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_throw_exception_if_input_is_not_given()
    {
        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences');

        //then
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $status);
        $this->assertStringContainsString(Messages::INPUT_REQUIRED, $response[Constants::MESSAGE]);
    }

    /**
     * @test
     */
    public function test_GetInputsMaxLetterOccurrences_will_throw_exception_if_input_is_given_as_empty_string()
    {
        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input=');

        //then
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $status);
        $this->assertStringContainsString(Messages::INPUT_REQUIRED, $response[Constants::MESSAGE]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_throw_exception_if_input_given_is_not_a_valid_string()
    {
        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input=dsdRRR*VVV9');

        //then
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $status);
        $this->assertStringContainsString(Messages::INPUT_REQUIRED, $response[Constants::MESSAGE]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_m_as_key_and_nine_occurrences_case_only_small_letters()
    {
        //given
        list($key, $occurrence) = ['m', 9];
        $input = 'mmmmmmmmmbcbbbccaaaaaaaabbdd';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_a_as_key_and_eight_occurrences_case_only_small_letters()
    {
        //given
        list($key, $occurrence) = ['a', 8];
        $input = 'aaabcbbbccaaaaaaaabbdd';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_j_as_key_and_ten_occurrences_case_only_small_letters()
    {
        //given
        list($key, $occurrence) = ['j', 10];
        $input = 'aaabjjjjjjjjjjcbbbccaaaaaaaabbdd';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_k_as_key_and_eleven_occurrences_case_only_small_letters()
    {
        //given
        list($key, $occurrence) = ['k', 11];
        $input = 'aaabjjjjjjjjjjcbbbccaaaaaaaabbddkkkkkkkkkkk';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_M_as_key_and_nine_occurrences_case_small_and_capital_letters()
    {
        //given
        list($key, $occurrence) = ['M', 9];
        $input = 'MMMMMMMMMaaabcbbbccRRRRRRRRbbddRRrrr';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_r_as_key_and_nine_occurrences_case_small_and_capital_letters()
    {
        //given
        list($key, $occurrence) = ['r', 9];
        $input = 'aaabcbbbccRRRRRRRRbbddRRrrrrrrrrr';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_H_as_key_and_ten_occurrences_case_small_and_capital_letters()
    {
        //given
        list($key, $occurrence) = ['H', 10];
        $input = 'aaabHHHHHHHHHHcbbbccaaaaaaaaHHHhhhbbddhhh';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_k_as_key_and_eleven_occurrences_case_small_and_capital_letters()
    {
        //given
        list($key, $occurrence) = ['k', 11];
        $input = 'aaabQQQQQQQcbbbccaaaaaaaabbddqqqqkkkkkkkkkkkQQQQQQQQQQQ';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_M_as_key_and_nine_occurrences_case_only_capital_letters()
    {
        //given
        list($key, $occurrence) = ['M', 9];
        $input = 'MMMMMMMMMAAABCBCCRRRRRRRRDPPPRRMMMM';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_R_as_key_and_nine_occurrences_case_only_capital_letters()
    {
        //given
        list($key, $occurrence) = ['R', 9];
        $input = 'KKMMLLOOORRRRRRRHHHHTTTVVVRRRRRRRRR';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_H_as_key_and_ten_occurrences_case_only_capital_letters()
    {
        //given
        list($key, $occurrence) = ['H', 10];
        $input = 'FFFHHHHHHHHHHCUUUEEEZZZXXXWWW';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_K_as_key_and_eleven_occurrences_case_only_capital_letters()
    {
        //given
        list($key, $occurrence) = ['K', 11];
        $input = 'AAAAQQQQIIIIYYYYVVVCDPMMKKKKKKKKKKKQQQQQQQQQQQ';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_f_as_key_and_one_occurrence_case_one_small_letter_is_given()
    {
        //given
        list($key, $occurrence) = ['f', 1];
        $input = 'f';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_F_as_key_and_one_occurrence_case_one_capital_letter_is_given()
    {
        //given
        list($key, $occurrence) = ['F', 1];
        $input = 'F';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_t_as_key_and_two_occurrences_case_two_consecutive_small_letters_are_given()
    {
        //given
        list($key, $occurrence) = ['t', 2];
        $input = 'tt';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_T_as_key_and_two_occurrences_case_two_consecutive_capital_letters_are_given()
    {
        //given
        list($key, $occurrence) = ['T', 2];
        $input = 'TT';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_d_as_key_and_three_occurrences_case_only_small_letters_are_given()
    {
        //given
        list($key, $occurrence) = ['d', 3];
        $input = 'dddv';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_D_as_key_and_three_occurrences_case_only_capital_letters_are_given()
    {
        //given
        list($key, $occurrence) = ['D', 3];
        $input = 'DDDV';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }

    /**
     * @test
     */
    public function test_getInputsMaxLetterOccurrences_will_return_letter_V_as_key_and_three_occurrences_case_small_and_capital_letters_are_given()
    {
        //given
        list($key, $occurrence) = ['V', 3];
        $input = 'VVVd';

        //when
        list($status, $response) = $this->getJsonResponse(Request::METHOD_GET, TestConstants::API_URI . '/maxLetterOccurrences?input='. $input);

        //then
        $this->assertEquals(Response::HTTP_OK, $status);
        $this->assertIsArray($response);
        $this->assertCount(1, $response);
        $this->assertArrayHasKey($key, $response);
        $this->assertSame($occurrence, $response[$key]);
    }
}